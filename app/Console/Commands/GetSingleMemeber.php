<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;
use App\Models\Member;
use App\Models\Constituency;

class GetSingleMemeber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-single-member';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $slugify = new Slugify();
        $memberId = $this->ask('Member ID');
        try {
            $client = new Client([
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]);

            $response = $client->get('https://members-api.parliament.uk/api/Members/' . $memberId);
            $member = json_decode($response->getBody()->getContents());

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

        } catch (ClientException $e){
            echo Psr7\Message::toString($e->getRequest());
            echo Psr7\Message::toString($e->getResponse());
        }
    }
}
