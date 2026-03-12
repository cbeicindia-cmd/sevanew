<?php

namespace Database\Seeders;

use App\Models\Scheme;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['Uttar Pradesh', 'Maharashtra', 'Bihar', 'Tamil Nadu', 'Karnataka', 'Rajasthan', 'Gujarat'];
        $categories = ['SC', 'ST', 'OBC', 'General', 'Women', 'Farmer', 'Student', 'Senior Citizen'];
        $departments = ['Rural Development', 'Social Welfare', 'Agriculture', 'Education', 'Minority Affairs', 'Health'];

        $rows = [];
        for ($i = 1; $i <= 3000; $i++) {
            $state = $states[array_rand($states)];
            $category = $categories[array_rand($categories)];
            $department = $departments[array_rand($departments)];

            $rows[] = [
                'scheme_name' => "SEVA Scheme {$i}",
                'scheme_code' => 'SSK-'.str_pad((string) $i, 5, '0', STR_PAD_LEFT),
                'state' => $state,
                'category' => $category,
                'department' => $department,
                'description' => "Government support initiative {$i} for {$state}.",
                'benefits' => 'Direct benefit transfer, subsidy, and service support.',
                'eligibility' => "Resident of {$state}; category {$category}; income below 300000.",
                'documents_required' => 'Aadhar, PAN, income certificate, domicile.',
                'application_process' => 'Apply via agent portal and submit verification documents.',
                'official_link' => 'https://www.india.gov.in',
                'last_updated' => now()->subDays(rand(1, 365))->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($rows) === 500) {
                Scheme::insert($rows);
                $rows = [];
            }
        }

        if (!empty($rows)) {
            Scheme::insert($rows);
        }
    }
}
