<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'How do I see my stats?',
            'answer' => 'Search for a userID in the search bar.',
        ]);

        Faq::create([
            'question' => 'Will other people be able to see my stats?',
            'answer' => 'Yes, all stats are public.',
        ]);

        // Add more FAQs as needed...
    }
}
