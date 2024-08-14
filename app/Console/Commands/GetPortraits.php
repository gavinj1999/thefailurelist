<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class GetPortraits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pol:get-portraits';

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
        $members = Member::select('slug', 'thumbnail', 'portrait')->get();

        foreach ($members as $member) {
            try {
                $url = $member->thumbnail;
                $imageContent = file_get_contents($url);
                $name = 'assets/images/members/thumbnails/' . $member->slug . '.jpeg';
                Storage::disk('public')->put($name, $imageContent);
            } catch (\Throwable $th) {
                $url = '/assets/images/templates/no-image.jpeg';
                $imageContent = file_get_contents($url);
                $name = 'assets/images/members/thumbnails/' . $member->slug . '.jpeg';
                Storage::disk('public')->put($name, $imageContent);

            }

            try {
                $url = $member->portrait;
                $imageContent = file_get_contents($url);
                $name = 'assets/images/members/portraits/' . $member->slug . '.jpeg';
                Storage::disk('public')->put($name, $imageContent);
            } catch (\Throwable $th) {
                $url = 'assets/images/templates/no-portrait.jpeg';
                $imageContent = file_get_contents($url);
                $name = 'assets/images/members/thumbnails/' . $member->slug . '.jpeg';
                Storage::disk('public')->put($name, $imageContent);

            }
        }
    }
}
