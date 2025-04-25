<?php
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run()
    {
        Setting::create(['key' => 'site_title', 'value' => 'My Portfolio']);
        Setting::create(['key' => 'bio', 'value' => 'I am a passionate Software Developer.']);
        Setting::create(['key' => 'profile_picture', 'value' => 'profile.jpg']);
    }
}
