<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'code' => 'BRG' . $i,
                'price' => 1000 * $i,
            ]);
        }
    }
}
