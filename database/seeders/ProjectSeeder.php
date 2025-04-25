<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'A personal portfolio to showcase my projects and skills.',
            'tech_stack' => json_encode(['Laravel', 'React', 'TailwindCSS']),
            'image' => 'portfolio.png',
            'github_link' => 'https://github.com/myportfolio',
            'live_link' => 'https://myportfolio.com',
        ]);

        Project::create([
            'title' => 'E-Commerce Website',
            'description' => 'An online store built using Laravel and Vue.js.',
            'tech_stack' => json_encode(['Laravel', 'Vue.js', 'Bootstrap']),
            'image' => 'ecommerce.png',
            'github_link' => 'https://github.com/ecommerce',
            'live_link' => 'https://ecommerce.com',
        ]);
    }
}

