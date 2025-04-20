<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SocialMediaController extends Controller
{
    public function index()
    {
        try {
            $links = SocialMediaLink::all();
            
            if ($links->isEmpty()) {
                Log::warning('No social media links found');
                return response()->json([]);
            }

            return response()->json($links);
        } catch (\Exception $e) {
            Log::error('Error in SocialMediaController@index: ' . $e->getMessage());
            return response()->json([
                'message' => 'Internal server error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 