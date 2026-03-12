<?php

namespace Database\Seeders;

use App\Models\Scheme;
use Illuminate\Database\Seeder;

class SchemeSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['Uttar Pradesh', 'Maharashtra', 'Tamil Nadu', 'Gujarat', 'Rajasthan', 'Karnataka'];
        $categories = ['SC', 'ST', 'OBC', 'General', 'Minority', 'Women', 'Farmer', 'Student'];
        $departments = ['Rural Development', 'Social Justice', 'Education', 'Women & Child', 'Agriculture'];

        for ($i = 1; $i <= 3000; $i++) {
            Scheme::create([
                'scheme_name' => "SEVA SETU Scheme {$i}",
                'scheme_code' => 'SSK-' . str_pad((string) $i, 5, '0', STR_PAD_LEFT),
                'state' => $states[array_rand($states)],
                'category' => $categories[array_rand($categories)],
                'department' => $departments[array_rand($departments)],
                'description' => 'Government welfare scheme for eligible citizens.',
                'benefits' => 'Financial aid, subsidy, and social support benefits.',
                'eligibility' => 'Income and category-based criteria; state resident proof required.',
                'documents_required' => 'Aadhar, income certificate, domicile, bank passbook.',
                'application_process' => 'Online registration via agent and district-level verification.',
                'official_link' => 'https://sevasetukendra.com/schemes/' . $i,
                'last_updated' => now()->subDays(rand(1, 365)),
            ]);
        }
    }
}
