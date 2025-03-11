<?php

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            ['name' => 'Laravel', 'proficiency' => 'Advanced'],
            ['name' => 'React.js', 'proficiency' => 'Intermediate'],
            ['name' => 'PHP', 'proficiency' => 'Advanced'],
            ['name' => 'JavaScript', 'proficiency' => 'Expert'],
            ['name' => 'MySQL', 'proficiency' => 'Intermediate'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}

