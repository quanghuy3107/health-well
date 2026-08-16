<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('sort_order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:mongodb.categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'banner_image' => 'nullable|string',
            'banner_title' => 'nullable|string|max:255',
            'banner_subtitle' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Category::create($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'banner_image' => 'nullable|string',
            'banner_title' => 'nullable|string|max:255',
            'banner_subtitle' => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $category->update($validated);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa.');
    }
}
