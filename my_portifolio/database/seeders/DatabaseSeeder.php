<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            SkillSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            ContactSeeder::class,
            SettingSeeder::class,
            SocialMediaLinkSeeder::class,
        ]);
    }
}
