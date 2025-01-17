<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'birthday' => '1970-01-01',
            'profile_picture' => 'profile_pictures/default.png', // Use a placeholder image path
            'bio' => 'I am the admin of this site.',
            'remember_token' => null,
            'created_at' => '2021-01-01 00:00:00',
            'phone_number' => '0123456789',
            'address' => 'Kattenberg 93, 2140 Antwerpen',
        ]);

        User::create([
            'username' => 'player1',
            'name' => 'Player 1',
            'email' => 'player1@example.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
            'birthday' => '2001-12-27',
            'profile_picture' => 'profile_pictures/default.png', // Use a placeholder image path
            'bio' => 'I am a player of this site.',
            'remember_token' => null,
            'created_at' => '2021-01-01 00:00:00',
            'phone_number' => '+32 472 123 456', 
            'address' => 'Rue de la Loi 16, 1000 Brussels', // Different address
        ]);

        // Add more users as needed...
    }
}
