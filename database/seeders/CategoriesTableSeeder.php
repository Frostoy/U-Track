<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Painkillers']);
        Category::create(['name' => 'Vitamins']);
        Category::create(['name' => 'First Aid']);
    }
}
