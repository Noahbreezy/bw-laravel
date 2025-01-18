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
        $faqs = [
            [
                'question' => 'How do I see my stats?',
                'answer' => 'Search for a username in the search bar.',
            ],
            [
                'question' => 'Will other people be able to see my stats?',
                'answer' => 'Yes, all stats are public.',
            ],
            [
                'question' => 'Can I delete my account?',
                'answer' => 'Currently, account deletion is supported.',
            ],
            [
                'question' => 'How can I reset my password?',
                'answer' => 'Click on "Forgot Password" on the login page and follow the instructions.',
            ],
            // Add more FAQs here as needed
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
