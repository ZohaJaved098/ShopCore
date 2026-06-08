<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Wireless Headphones',
                'price' => 12000,
                'short_desc' => 'Noise cancelling premium headphones',
                'long_desc' => 'Experience deep bass, 30hr battery life, and comfort for all-day use.',
                'product_image' => '/seed-images/products/headphones.jpg',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smart Watch Pro',
                'price' => 18000,
                'short_desc' => 'Fitness + notifications smartwatch',
                'long_desc' => 'Track heart rate, sleep, steps, and stay connected on the go.',
                'product_image' => '/seed-images/products/smartwatch.jpg',
                'featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaming Mouse',
                'price' => 4500,
                'short_desc' => 'High precision RGB gaming mouse',
                'long_desc' => 'Ergonomic design with adjustable DPI for competitive gaming.',
                'product_image' => '/seed-images/products/mouse.jpg',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
