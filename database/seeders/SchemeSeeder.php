<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchemeSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['All', 'Uttar Pradesh', 'Maharashtra', 'Rajasthan', 'Bihar', 'Madhya Pradesh', 'Tamil Nadu'];
        $categories = ['General', 'SC', 'ST', 'OBC', 'Minority', 'Women', 'Farmer', 'Student'];
        $departments = ['Rural Development', 'Social Justice', 'Agriculture', 'Education', 'Health', 'Housing'];
        $genders = ['Any', 'Male', 'Female'];

        $rows = [];

        for ($i = 1; $i <= 3000; $i++) {
            $state = $states[array_rand($states)];
            $category = $categories[array_rand($categories)];
            $department = $departments[array_rand($departments)];

            $rows[] = [
                'scheme_name' => "SEVA Scheme {$i}",
                'scheme_code' => sprintf('SSK-%05d', $i),
                'state' => $state,
                'category' => $category,
                'department' => $department,
                'description' => "Government support scheme {$i} for {$category} beneficiaries.",
                'benefits' => 'Financial support, training, and subsidy benefits.',
                'eligibility' => "Residents of {$state}, category {$category}, and scheme-specific criteria.",
                'documents_required' => 'Aadhar, income certificate, domicile proof, bank passbook.',
                'application_process' => 'Apply online via agent portal, upload documents, submit verification request.',
                'official_link' => "https://sevasetukendra.com/schemes/SSK-{$i}",
                'max_income' => rand(100000, 1000000),
                'min_age' => rand(18, 40),
                'gender' => $genders[array_rand($genders)],
                'last_updated' => now()->subDays(rand(0, 365))->toDateString(),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($rows) === 200) {
                DB::table('schemes')->insert($rows);
                $rows = [];
            }
        }

        if (! empty($rows)) {
            DB::table('schemes')->insert($rows);
        }
    }
}
