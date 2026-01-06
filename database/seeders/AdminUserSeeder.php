<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run()
{
    User::updateOrCreate(
        ['email' => 'admin@clinic.local'],
        [
            'name' => 'Clinic Admin',
            'password' => Hash::make('123456'), // مؤقت
            'role' => 'admin'
        ]
    );
}

}
