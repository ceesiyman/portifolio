<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'type' => 'work',
            'title' => 'Senior Software Engineer',
            'organization' => 'Tech Solutions Inc.',
            'start_date' => '2020-01-01',
            'end_date' => '2023-12-31',
            'description' => 'Led development of enterprise applications and mentored junior developers. Implemented modern web technologies and best practices.',
            'skills' => ['Laravel', 'Vue.js', 'AWS', 'Docker']
        ]);

        Experience::create([
            'type' => 'work',
            'title' => 'Full Stack Developer',
            'organization' => 'Digital Innovations',
            'start_date' => '2018-06-01',
            'end_date' => '2019-12-31',
            'description' => 'Developed and maintained web applications using modern technologies. Collaborated with cross-functional teams.',
            'skills' => ['React', 'Node.js', 'MongoDB', 'Express']
        ]);

        Experience::create([
            'type' => 'education',
            'title' => 'Master of Computer Science',
            'organization' => 'University of Technology',
            'start_date' => '2018-09-01',
            'end_date' => '2020-06-30',
            'description' => 'Specialized in Software Engineering and Web Technologies. Graduated with honors.',
            'skills' => ['Research', 'Machine Learning', 'Data Structures']
        ]);
    }
}
