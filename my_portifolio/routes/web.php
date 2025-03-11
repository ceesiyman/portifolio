<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;

Route::get('/', [HomeController::class, 'index']); // This will load the home page
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Your authenticated routes
});