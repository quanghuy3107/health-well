<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Pagination\LengthAwarePaginator;
use Exception;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * Dynamic category page — works for any category slug.
     */
    public function category($slug)
    {
        $categories = collect();
        $category = null;
        $perPage = 6;

        try {
            $categories = Category::active()->orderBy("sort_order")->get();
            $category = Category::where("slug", $slug)->firstOrFail();
            $products = Product::active()
                ->byCategory($slug)
                ->orderBy("sort_order")
                ->paginate($perPage);
        } catch (Exception $e) {
            $allProducts = $this->getProductsFromJson($slug);
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $products = new LengthAwarePaginator(
                array_slice($allProducts, ($currentPage - 1) * $perPage, $perPage),
                count($allProducts),
                $perPage,
                $currentPage,
                ["path" => request()->url(), "query" => request()->query()]
            );
        }

        if (!$category && $products->isEmpty()) {
            abort(404);
        }

        $banner = [
            "image" => asset($category?->banner_image ?? "images/modern-clean-home.jpg"),
            "title" => $category?->banner_title ?? ucfirst($slug),
            "subtitle" => $category?->banner_subtitle ?? "Discover the best products in this category.",
        ];

        return view("pages.product_list", compact("products", "banner", "category", "categories"));
    }

    public function showProduct($slug)
    {
        $categories = collect();
        try {
            $categories = Category::active()->orderBy('sort_order')->get();
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

        return view('pages.product_detail', compact('product', 'categories'));
    }

    /**
     * Fallback: read products from JSON file when MongoDB is unavailable.
     */
    private function getProductsFromJson(string $category): array
    {
        $jsonPath = storage_path('app/products.json');
        if (!file_exists($jsonPath)) return [];
        $all = json_decode(file_get_contents($jsonPath), true);
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
