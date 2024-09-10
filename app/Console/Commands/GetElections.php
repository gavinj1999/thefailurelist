<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use App\Models\Member;
use App\Models\Election;
use Cocur\Slugify\Slugify;

class GetElections extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-elections';

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
      $members = Member::all();
      $i = 0;
      $bar = $this->output->createProgressBar($i);

      foreach ($members as $member) {
        try {
            $client = new Client([
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]);

            $electionResponse = $client->get('https://members-api.parliament.uk/api/Members/'.$member->member_id.'/LatestElectionResult');
            $election = json_decode($electionResponse->getBody()->getContents());

            $election = Election::updateOrCreate(
                ['member_id' => $member->member_id],
                [
                    'member_id' => $member->member_id ,
                    'winning_party' => $election->value->winningParty->name,
                    'party_id' => $election->value->winningParty->id,
                    'party_slug' => $election->value->winningParty->name,
                    'backgroundColour' => $election->value->winningParty->backgroundColour,
                    'foregroundColour'  => $election->value->winningParty->foregroundColour,
                    'constituencyName' => $election->value->constituencyName,
                    'result' => $election->value->result,
                    'electorate' => $election->value->electorate,
                    'turnout' => $election->value->turnout,
                    'majority' => $election->value->majority,
                ]

                );

        } catch (ClientException $e) {
                echo Psr7\Message::toString($e->getRequest());
                echo Psr7\Message::toString($e->getResponse());
            }
            $bar->advance();
            $i++;
    }
}
}


