<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create general users
        User::factory(10)->create();

        // Create a user with the 'client' role
        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
            'role' => 'client'
        ]);

        // Create a user with the 'employee' role
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'), // Ensure you hash the password
            'role' => 'employee'
        ]);
    }
}
