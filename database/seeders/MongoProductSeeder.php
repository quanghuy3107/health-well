<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class MongoProductSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo categories
        $categories = [
            [
                'name' => 'Health',
                'slug' => 'health',
                'description' => 'Smart solutions for a cleaner, safer, and more relaxing home environment.',
                'image' => '/images/healthier-sanctuary-home.jpg',
                'banner_image' => '/images/healthier-sanctuary-home.jpg',
                'banner_title' => 'A Healthier Sanctuary',
                'banner_subtitle' => 'Smart solutions for a cleaner, safer, and more relaxing home environment.',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Training',
                'slug' => 'training',
                'description' => 'Premium supplements and equipment to crush your fitness goals.',
                'image' => '/images/peak-performance-fitness.jpg',
                'banner_image' => '/images/peak-performance-fitness.jpg',
                'banner_title' => 'Peak Performance at Home',
                'banner_subtitle' => 'Premium supplements and equipment to crush your fitness goals.',
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );
        }

        $this->command->info('Categories seeded.');

        // Import products từ JSON
        $jsonPath = storage_path('app/products.json');

        if (!file_exists($jsonPath)) {
            $this->command->error('products.json not found!');
            return;
        }

        $products = json_decode(file_get_contents($jsonPath), true);

        foreach ($products as $productData) {
            $category = Category::where('slug', $productData['category'])->first();

            Product::updateOrCreate(
                ['slug' => $productData['slug']],
                array_merge($productData, [
                    'category_id' => $category?->_id,
                    'is_active' => true,
                    'sort_order' => 0,
                ])
            );
        }

        $this->command->info(count($products) . ' products seeded from JSON.');
    }
}
