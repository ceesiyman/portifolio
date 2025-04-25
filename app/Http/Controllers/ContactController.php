<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string'
            ]);

            // Get the admin user's email
            $adminUser = User::where('is_admin', true)->first();

            if (!$adminUser) {
                Log::error('No admin user found to send contact form email to.');
                return response()->json(['message' => 'Unable to process request'], 500);
            }

            // Send email to admin
            Mail::to($adminUser->email)->send(new ContactFormMail($validated));

            return response()->json(['message' => 'Message sent successfully'], 200);

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send message'], 500);
        }
    }
} 