<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use Cocur\Slugify\Slugify;
use App\Models\Opposition;

class GetOpposition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-opposition';

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

        $governmentResponse = $client->get('https://members-api.parliament.uk/api/Posts/OppositionPosts');

        $opposition = json_decode($governmentResponse->getBody()->getContents());

        foreach ($opposition as $post) {
            $this->info($post->value->name);
            $opposition = Opposition::updateOrCreate(
                ['opposition_id' => $post->value->id],
                [
                    'name' => $post->value->name,
                    'hansardName' => $post->value->hansardName,
                    'opposition_id' => $post->value->id,
                    'member_id' => $post->value->postHolders[0]->member->value->id,
                    'sort_order' => $i,
                    'slug' => $slugify->slugify($post->value->hansardName),
                ]
            );
            $i++;
        };
    }
}
