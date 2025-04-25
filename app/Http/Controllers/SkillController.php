<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $skills = Skill::all();
            return response()->json([
                'status' => 'success',
                'data' => $skills
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch skills',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'proficiency' => 'required|integer|between:0,100',
            ]);

            $skill = Skill::create($validated);
            return response()->json([
                'status' => 'success',
                'data' => $skill
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create skill',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $skill = Skill::findOrFail($id);

            $validated = $request->validate([
                'name' => 'string|max:255',
                'proficiency' => 'integer|between:0,100',
            ]);

            $skill->update($validated);
            return response()->json([
                'status' => 'success',
                'data' => $skill
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update skill',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $skill = Skill::findOrFail($id);
            $skill->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete skill',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 