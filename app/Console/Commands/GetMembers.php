<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;
use App\Models\Member;
use App\Models\Constituency;

class GetMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-members';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get latest members';

    /**
     * Execute the console command.
     */
    public function handle()
    {
 $constituencies = Constituency::all();
        $slugify = new Slugify();
        $i = 0;

        $bar = $this->output->createProgressBar($i);



        foreach ($constituencies as $constituency) {
            try {
                $client = new Client([
                    // You can set any number of default request options.
                    'timeout' => 2.0,
                ]);

                $memberResponse = $client->get('https://members-api.parliament.uk/api/Members/' . $constituency->currentRepresentationId);
                $member = json_decode($memberResponse->getBody()->getContents());
                $data = $member->value;
                if($member){

                  if (

                    $member->value->latestHouseMembership->house == 1
                ) {
                    $member = Member::updateOrCreate(
                        ['member_id' => $member->value->id],
                        [
                            'member_id' => $member->value->id,
                            'nameDisplayAs' => $member->value->nameDisplayAs,
                            'nameListAs' => $member->value->nameListAs,
                            'slug' => $slugify->slugify($member->value->nameDisplayAs),
                            'party_id' => $member->value->latestParty->id,
                            'gender' => $member->value->gender,
                            'portrait' => 'https://members-api.parliament.uk/api/Members/'.$member->value->id.'/Portrait?cropType=0&webVersion=true',
                            'thumbnail'=> 'https://members-api.parliament.uk/api/Members/'.$member->value->id.'/Portrait?cropType=1&webVersion=true' ,
                            'banner' => 'https://members-api.parliament.uk/api/Members/'.$member->value->id.'/Portrait?cropType=&webVersion=true' ,
                            'constituencyId' => $member->value->latestHouseMembership->membershipFromId,
                            'membershipStartDate' => $member->value->latestHouseMembership->membershipStartDate,
                            'statusStartDate' => $member->value->latestHouseMembership->membershipStatus->statusStartDate,


                        ]
                    );
                }

                }
            } catch (ClientException $e) {
                echo Psr7\Message::toString($e->getRequest());
                echo Psr7\Message::toString($e->getResponse());
            }


            $bar->advance();
            $i++;
        }
    }
}
