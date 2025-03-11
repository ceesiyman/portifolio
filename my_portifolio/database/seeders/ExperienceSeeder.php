<?php
use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run()
    {
        Experience::create([
            'company' => 'Tech Corp',
            'role' => 'Software Developer',
            'start_date' => '2022-06-01',
            'end_date' => null,
            'description' => 'Developing and maintaining web applications.',
        ]);

        Experience::create([
            'company' => 'Startup Inc.',
            'role' => 'Frontend Developer',
            'start_date' => '2021-03-01',
            'end_date' => '2022-05-31',
            'description' => 'Worked on the frontend using React and TailwindCSS.',
        ]);
    }
}
