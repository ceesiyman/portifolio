<?php

// app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use App\Models\Experience;
use App\Models\Education;
use App\Models\SocialMediaLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    // Fetch the admin user (assuming the first user is the admin)
    $admin = User::first(); // Modify as needed to target the correct admin

    // Fetch other necessary data
    $projects = Project::latest()->take(3)->get();
    $skills = Skill::all();
    $experiences = Experience::latest()->get();
    $educations = Education::latest()->get();
    $socialLinks = SocialMediaLink::all();

    return view('home', compact('admin', 'projects', 'skills', 'experiences', 'educations', 'socialLinks'));
}

}

