<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'This is a sample bio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'bio' => 'Another sample bio',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
