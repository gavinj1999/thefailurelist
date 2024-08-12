<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;
use App\Models\Government;

class GetGovernment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-government';

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

        $governmentResponse = $client->get('https://members-api.parliament.uk/api/Posts/GovernmentPosts');

        $government = json_decode($governmentResponse->getBody()->getContents());

        foreach ($government as $post) {
            $this->info($post->value->name);
            $government = Government::updateOrCreate(
                ['government_id' => $post->value->id],
                [
                    'name' => $post->value->name,
                    'hansardName' => $post->value->hansardName,
                    'government_id' => $post->value->id,
                    'member_id' => $post->value->postHolders[0]->member->value->id,
                    'sort_order' => $i,
                    'slug' => $slugify->slugify($post->value->hansardName),
                ]
            );
            $i++;
        };
    }
}
