<?php
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'message' => 'I love your portfolio! Let’s work together.',
            'status' => 'pending',
        ]);
    }
}
