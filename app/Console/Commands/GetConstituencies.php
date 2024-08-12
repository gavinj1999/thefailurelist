<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Constituency;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;

class GetConstituencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-constituencies';

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
        $startId = $this->ask('Set Start ID', 3878);
        $endId = $this->ask('Set end ID', 4527 );
        $slugify = new Slugify();
        $i = $startId;
        $client = new Client([
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
        $bar = $this->output->createProgressBar($i);
        while ($i < $endId) {
            try{
             $response = $client->get('https://members-api.parliament.uk/api/Location/Constituency/' . $i);
            } catch (ClientException $e) {
                echo Psr7\Message::toString($e->getRequest());
                echo Psr7\Message::toString($e->getResponse());
            }

            $constituencies = json_decode($response->getBody()->getContents());

            if ($constituencies) {
                if ($constituencies->value->id  && !$constituencies->value->endDate) {
                    $this->info($slugify->slugify($constituencies->value->name));
                    $flight = Constituency::updateOrCreate(
                        [
                            'constituencyId' => $constituencies->value->id
                        ],
                        [
                            'constituencyId' => $constituencies->value->id,
                            'constituencyName' => $constituencies->value->name,
                            'currentRepresentationId' => $constituencies->value->currentRepresentation->member->value->id,
                            'slug' => $slugify->slugify($constituencies->value->name),
                            'startDate' => $constituencies->value->startDate,
                            'endDate' => $constituencies->value->endDate,
                            'latestParty' => $constituencies->value->currentRepresentation->member->value->latestParty->id,
                        ]
                    );
                }
            }

            $bar->advance();
            $i++;
        };
    }
}
