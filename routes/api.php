<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/educations', [EducationController::class, 'index']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);
Route::get('/social-media', [SocialMediaController::class, 'index']);
Route::get('/admin-contact', [UserController::class, 'getAdminContact']);

// Contact form submission
Route::post('/contact', [ContactController::class, 'submit']);

// All routes are now public
Route::apiResource('projects', ProjectController::class)->except(['index', 'show']);
Route::apiResource('experiences', ExperienceController::class);
Route::apiResource('educations', EducationController::class);
Route::apiResource('skills', SkillController::class);
Route::apiResource('settings', SettingController::class);
Route::apiResource('social-media', SocialMediaController::class);
Route::get('/contacts', [ContactController::class, 'index']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
