<?php

namespace App\Console\Commands;

use App\Models\Constituency;
use App\Models\Geometry;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;


class GetGeometry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-geometry';

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
                    'timeout' => 2.0,
                ]);

                //$geometryResponse = $client->get('https://members-api.parliament.uk/api/Location/Constituency/' . $constituency->constituency_id . '/Geometry');
                $geometryResponse = $client->get('https://members-api.parliament.uk/api/Location/Constituency/4508/Geometry');
                $geometry = json_decode($geometryResponse->getBody()->getContents());
                $geometryArray = json_decode($geometry->value);
                $coordinates = $geometryArray->coordinates;

                foreach ($coordinates as $coordinate) {
                    str($coordinate);
                    // $this->info($coordinate['value']);
                };
                dd('done');

                $i = 0;
                $coord = '[';
                foreach ($coordinates as $key => $coordinate) {
                    if ($key === array_key_last($coordinates)) {
                        $split = '';
                    } else {
                        $split = ', ';
                    }
                    $strLat =
                        '{ "lat": ' . str($coordinate[1] .
                            ', "lng": ' . str($coordinate[0]) .
                            '}'
                            .
                            $split);

                    $coord .= $strLat;
                };
                $coord .= ']';

                $geometry = Geometry::updateOrCreate(
                    ['constituency_id' => $constituency->constituency_id],
                    [
                        'constituency_id' => $constituency->constituency_id,
                        'value' => $coord,

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
