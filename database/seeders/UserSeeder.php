<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nom' => 'El hadji',
                'prenom' => 'Sarr',
                'email' => 'elhadji@gmail.com',
                'telephone' => '770000000',
                'adresse' => '123 Main Street',
                'email_verified_at' => now(),
                'password' => Hash::make('Elhadjisarr12'),
                'role' => 'manager',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Smith',
                'prenom' => 'Jane',
                'email' => 'jane.smith@example.com',
                'telephone' => '771234567',
                'adresse' => '456 Elm Street',
                'email_verified_at' => now(),
                'password' => Hash::make('000'),
                'role' => 'client',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
