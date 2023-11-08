<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'joseluche3@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$jExRkYrvwewKBbJuNoXaouioDrgzfl4tzR8jTCc3Nnga6qESlfOO.', // password
            
        ]);

        $user->assignRole('writer', 'admin');
    }
}
