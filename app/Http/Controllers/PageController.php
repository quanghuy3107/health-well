<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function training()
    {
        try {
            $category = Category::where('slug', 'training')->first();
            $products = Product::active()->byCategory('training')->get()->toArray();
        } catch (\Exception $e) {
            $products = $this->getProductsFromJson('training');
            $category = null;
        }

        $banner = [
            'image' => asset($category?->banner_image ?? 'images/peak-performance-fitness.jpg'),
            'title' => $category?->banner_title ?? 'Peak Performance at Home',
            'subtitle' => $category?->banner_subtitle ?? 'Premium supplements and equipment to crush your fitness goals.',
        ];

        return view('pages.product_list', compact('products', 'banner'));
    }

    public function health()
    {
        try {
            $category = Category::where('slug', 'health')->first();
            $products = Product::active()->byCategory('health')->get()->toArray();
        } catch (\Exception $e) {
            $products = $this->getProductsFromJson('health');
            $category = null;
        }

        $banner = [
            'image' => asset($category?->banner_image ?? 'images/healthier-sanctuary-home.jpg'),
            'title' => $category?->banner_title ?? 'A Healthier Sanctuary',
            'subtitle' => $category?->banner_subtitle ?? 'Smart solutions for a cleaner, safer, and more relaxing home environment.',
        ];

        return view('pages.product_list', compact('products', 'banner'));
    }

    public function showProduct($slug)
    {
        try {
            $product = Product::active()->where('slug', $slug)->first();
            if ($product) {
                $product = $product->toArray();
            }
        } catch (\Exception $e) {
            $product = null;
        }

        // Fallback to JSON
        if (!$product) {
            $products = json_decode(file_get_contents(storage_path('app/products.json')), true);
            $product = collect($products)->firstWhere('slug', $slug);
        }

        if (!$product) {
            abort(404);
        }

        return view('pages.product_detail', compact('product'));
    }

    /**
     * Fallback: read products from JSON file when MongoDB is unavailable.
     */
    private function getProductsFromJson(string $category): array
    {
        $all = json_decode(file_get_contents(storage_path('app/products.json')), true);
        return collect($all)->where('category', $category)->values()->toArray();
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('huyp3172004@gmail.com')->send(new ContactMail($validated));
            return back()->with('success', 'Your message has been sent successfully! Our team will get back to you within 24 hours.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
