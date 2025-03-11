<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeUserAdmin extends Command
{
    protected $signature = 'make:admin {email?} {--create : Create a new admin user}';
    protected $description = 'Make an existing user an admin or create a new admin user';

    public function handle()
    {
        if ($this->option('create')) {
            $name = $this->ask('Enter admin name');
            $email = $this->ask('Enter admin email');
            $password = $this->secret('Enter admin password');

            // Create new admin user
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'is_admin' => true,
            ]);

            $this->info("Admin user created: {$user->email}");
            return;
        }

        $email = $this->argument('email');
        
        if (!$email) {
            $email = $this->ask('Enter the email of the user to make admin');
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("User with email {$email} not found.");
            return;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("User {$user->email} is now an admin.");
    }
}