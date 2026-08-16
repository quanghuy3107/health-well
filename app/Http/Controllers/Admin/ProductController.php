<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::active()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:500',
            'slug' => 'required|string|max:255|unique:mongodb.products,slug',
            'category' => 'required|string',
            'category_id' => 'nullable|string',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'image' => 'required|string',
            'gallery_images' => 'nullable|array',
            'original_price' => 'nullable|string',
            'price' => 'required|string',
            'price_numeric' => 'required|numeric',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'star_rating' => 'nullable|numeric|min:0|max:5',
            'review_count' => 'nullable|integer|min:0',
            'affiliate_link' => 'nullable|string',
            'key_features' => 'nullable|array',
            'specifications' => 'nullable|array',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được tạo thành công.');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::active()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:500',
            'slug' => 'required|string|max:255',
            'category' => 'required|string',
            'category_id' => 'nullable|string',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'image' => 'required|string',
            'gallery_images' => 'nullable|array',
            'original_price' => 'nullable|string',
            'price' => 'required|string',
            'price_numeric' => 'required|numeric',
            'discount_percentage' => 'nullable|integer|min:0|max:100',
            'star_rating' => 'nullable|numeric|min:0|max:5',
            'review_count' => 'nullable|integer|min:0',
            'affiliate_link' => 'nullable|string',
            'key_features' => 'nullable|array',
            'specifications' => 'nullable|array',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
