<?php
use Illuminate\Database\Seeder;
use App\Models\SocialMediaLink;

class SocialMediaLinkSeeder extends Seeder
{
    public function run()
    {
        SocialMediaLink::create([
            'platform' => 'LinkedIn',
            'link' => 'https://linkedin.com/in/johndoe',
            'icon' => 'linkedin-icon.png',
        ]);

        SocialMediaLink::create([
            'platform' => 'GitHub',
            'link' => 'https://github.com/johndoe',
            'icon' => 'github-icon.png',
        ]);

        SocialMediaLink::create([
            'platform' => 'Twitter',
            'link' => 'https://twitter.com/johndoe',
            'icon' => 'twitter-icon.png',
        ]);
    }
}
