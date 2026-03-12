<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@sevasetukendra.com',
            'mobile' => '9000000000',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'status' => 'approved',
        ]);

        User::create([
            'name' => 'Platform Admin',
            'email' => 'admin@sevasetukendra.com',
            'mobile' => '9000000001',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'approved',
        ]);

        $this->call(SchemeSeeder::class);
    }
}
