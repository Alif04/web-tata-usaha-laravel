<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'username' => 'asep_ex',
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);
    }
}
