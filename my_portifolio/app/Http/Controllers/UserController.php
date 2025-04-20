<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getAdminContact()
    {
        try {
            $admin = User::where('is_admin', true)->first();
            
            if (!$admin) {
                Log::error('Admin user not found');
                return response()->json([
                    'message' => 'Admin user not found'
                ], 404);
            }

            return response()->json([
                'email' => $admin->email,
                'phone' => $admin->phone ?? 'Not provided'
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getAdminContact: ' . $e->getMessage());
            return response()->json([
                'message' => 'Internal server error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 