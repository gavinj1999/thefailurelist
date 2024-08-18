<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;
use App\Models\Party;

class GetParties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-parties';

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
        $i = 0;
        $bar = $this->output->createProgressBar($i);
        // try {
        $client = new Client([
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);

        $partiesResponse = $client->get('https://members-api.parliament.uk/api/Parties/GetActive/1');

        $partiesData = json_decode($partiesResponse->getBody()->getContents());
        $parties = $partiesData->items;
        foreach ($parties as $party) {
            $this->info($party->value->name);
            $party = Party::updateOrCreate(
                ['party_id' => $party->value->id],
                [
                    'party_id' => $party->value->id,
                    'name' => $party->value->name,
                    'abbreviation' => $party->value->abbreviation,
                    'backgroundColour' => '#'.$party->value->backgroundColour,
                    'foregroundColour' => '#'.$party->value->foregroundColour,
                    'isLordsMainParty' => $party->value->isLordsMainParty,
                    'isLordsSpiritualParty' => $party->value->isLordsSpiritualParty,
                    'governmentType' => $party->value->governmentType,
                    'isIndependentParty' => $party->value->isIndependentParty,
                    'slug' => $slugify->slugify($party->value->name)
                ]
            );
            $i++;
        };
    }
}
