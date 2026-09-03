<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\BSON\Regex;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);

        $term = trim($validated['q'] ?? '');
        $categories = Category::active()->orderBy('sort_order')->get();
        $products = collect();
        $posts = collect();

        if ($term !== '') {
            $regex = new Regex(preg_quote($term, '/'), 'i');

            $products = Product::active()
                ->where(function ($query) use ($regex) {
                    $query->where('name', 'regex', $regex)
                        ->orWhere('description', 'regex', $regex)
                        ->orWhere('category_label', 'regex', $regex);
                })
                ->orderBy('sort_order')
                ->limit(12)
                ->get();

            $posts = BlogPost::published()
                ->where(function ($query) use ($regex) {
                    $query->where('title', 'regex', $regex)
                        ->orWhere('excerpt', 'regex', $regex)
                        ->orWhere('category', 'regex', $regex);
                })
                ->orderBy('created_at', 'desc')
                ->limit(12)
                ->get();
        }

        return view('search.index', compact('term', 'categories', 'products', 'posts'));
    }
}
