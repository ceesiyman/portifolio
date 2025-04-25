<?php
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    public function run()
    {
        Education::create([
            'institution' => 'University of XYZ',
            'degree' => 'Bachelor of Computer Science',
            'start_year' => 2018,
            'end_year' => 2022,
        ]);
    }
}
