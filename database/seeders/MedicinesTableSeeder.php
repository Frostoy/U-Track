<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'name' => 'Paracetamol',
            'category_id' => 1,
            'stock_quantity' => 50,
            'expiry_date' => '2025-12-31',
            'price' => 5000,
        ]);

        Medicine::create([
            'name' => 'Vitamin C',
            'category_id' => 2,
            'stock_quantity' => 100,
            'expiry_date' => '2026-06-30',
            'price' => 3000,
        ]);
    }
}
