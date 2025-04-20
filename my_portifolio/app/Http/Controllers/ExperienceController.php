<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $experiences = Experience::orderBy('start_date', 'desc')
                ->get()
                ->map(function ($experience) {
                    return [
                        'id' => $experience->id,
                        'type' => $experience->type,
                        'title' => $experience->title,
                        'organization' => $experience->organization,
                        'company' => $experience->company,
                        'role' => $experience->role,
                        'start_date' => $experience->start_date,
                        'end_date' => $experience->end_date,
                        'description' => $experience->description,
                        'skills' => $experience->skills ? json_decode($experience->skills) : [],
                    ];
                });
            
            return response()->json($experiences);
        } catch (\Exception $e) {
            \Log::error('Experience API Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Failed to fetch experiences',
                'message' => $e->getMessage()
            ], 500);
        }
    }
} 