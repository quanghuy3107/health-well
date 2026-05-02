<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getProductsByCategory($category)
    {
        $all = json_decode(file_get_contents(storage_path('app/products.json')), true);

        return collect($all)->where('category', $category)->values()->toArray();
    }

    public function training()
    {
        $products = $this->getProductsByCategory('training');

        $banner = [
            'image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=1600',
            'title' => 'Peak Performance at Home',
            'subtitle' => 'Premium supplements and equipment to crush your fitness goals.',
        ];

        return view('pages.product_list', compact('products', 'banner'));
    }

    public function health()
    {
        $products = $this->getProductsByCategory('health');

        $banner = [
            'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=1600',
            'title' => 'A Healthier Sanctuary',
            'subtitle' => 'Smart solutions for a cleaner, safer, and more relaxing home environment.',
        ];

        return view('pages.product_list', compact('products', 'banner'));
    }

    public function showProduct($slug)
    {
        $products = json_decode(file_get_contents(storage_path('app/products.json')), true);

        $product = collect($products)->firstWhere('slug', $slug);

        if (!$product) {
            abort(404);
        }

        return view('pages.product_detail', compact('product'));
    }
}
