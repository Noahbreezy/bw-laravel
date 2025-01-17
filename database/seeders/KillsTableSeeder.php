<?php

namespace Database\Seeders;

use App\Models\Kill;
use App\Models\User;
use Illuminate\Database\Seeder;

class KillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // get the first user

        Kill::create([
            'user_id' => $user->id,
            'killCount' => 123456789,
            'timestamp' => now(),
        ]);

        // Add more kills as needed...
    }
}
