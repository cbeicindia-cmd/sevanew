<?php

namespace Database\Seeders;

use App\Models\Scheme;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['All', 'Uttar Pradesh', 'Maharashtra', 'Rajasthan', 'Bihar', 'Gujarat', 'Tamil Nadu'];
        $categories = ['General', 'SC', 'ST', 'OBC', 'Women', 'Farmer', 'Student', 'Senior Citizen'];
        $departments = ['Social Welfare', 'Education', 'Agriculture', 'Minority Affairs', 'Rural Development'];

        $rows = [];
        for ($i = 1; $i <= 3000; $i++) {
            $rows[] = [
                'scheme_name' => "SEVA Scheme {$i}",
                'scheme_code' => 'SSK-' . str_pad((string) $i, 5, '0', STR_PAD_LEFT),
                'state' => $states[array_rand($states)],
                'category' => $categories[array_rand($categories)],
                'department' => $departments[array_rand($departments)],
                'description' => 'Government benefit program for eligible citizens.',
                'benefits' => 'Financial assistance, subsidy, and support services.',
                'eligibility' => 'Income up to ₹2,50,000; category and state specific criteria.',
                'documents_required' => 'Aadhaar, income certificate, residence proof, bank passbook.',
                'application_process' => 'Apply via SEVA SETU KENDRA agent with verified documents.',
                'official_link' => 'https://example.gov/scheme/' . $i,
                'last_updated' => now()->subDays(rand(0, 365)),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($rows) === 500) {
                Scheme::insert($rows);
                $rows = [];
            }
        }

        if ($rows !== []) {
            Scheme::insert($rows);
        }
    }
}
