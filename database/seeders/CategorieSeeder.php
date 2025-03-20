<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
           'Burger Simple',
           'Burger Double',
           'Big Burger',
           'Burger Max',
           'Big Burger Simple',
        ];

        foreach ($categories as $categorie) {
           Categorie::firstOrCreate(['nom' => $categorie]);
        }
    }
}
