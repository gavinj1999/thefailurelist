<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use App\Models\Constituency;
use App\Models\Election;
use App\Models\ElectionResult;
use Cocur\Slugify\Slugify;

class GetElectionResult extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-election-result';

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
       $constituencies = Constituency::all();
       $i = 0;
       $bar = $this->output->createProgressBar($i);

       foreach ($constituencies as $constituency) {
        try {

            $client = new Client([
                // You can set any number of default request options.
                'timeout' => 2.0,
            ]);


            $electionResponse = $client->get('https://members-api.parliament.uk/api/Location/Constituency/'.$constituency->constituency_id.'/ElectionResult/Latest');
            $election = json_decode($electionResponse->getBody()->getContents());

            $electionResult = ElectionResult::updateOrCreate(
                ['constituency_id' => $constituency->constituency_id],
                [
                    'constituency_id' => $constituency->constituency_id,

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
