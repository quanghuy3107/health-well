<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('sort_order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        $blogCategories = BlogCategory::active()->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blog.create', compact('blogCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'slug' => 'required|string|max:255|unique:mongodb.blog_posts,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'focus_keywords' => 'nullable|array',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'read_time' => 'nullable|string|max:50',
            'affiliate_url' => 'nullable|url|max:2000',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
            'custom_date' => 'boolean',
            'published_date_input' => 'nullable|date',
        ]);

        $validated['is_published'] = $request->boolean('is_published', false);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        // Xử lý thời gian tạo
        if ($request->boolean('custom_date') && $request->filled('published_date_input')) {
            $date = Carbon::parse($request->input('published_date_input'));
            $validated['date'] = $date->format('M j, Y');
            $validated['published_date'] = $date->toIso8601String();
        } else {
            $validated['date'] = now()->format('M j, Y');
            $validated['published_date'] = now()->toIso8601String();
        }

        // Xóa các field tạm
        unset($validated['custom_date'], $validated['published_date_input']);

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    public function edit(string $id)
    {
        $post = BlogPost::findOrFail($id);
        $blogCategories = BlogCategory::active()->orderBy('sort_order')->orderBy('name')->get();
        return view('admin.blog.edit', compact('post', 'blogCategories'));
    }

    public function update(Request $request, string $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:500',
            'slug' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'focus_keywords' => 'nullable|array',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'read_time' => 'nullable|string|max:50',
            'affiliate_url' => 'nullable|url|max:2000',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
            'custom_date' => 'boolean',
            'published_date_input' => 'nullable|date',
        ]);

        $validated['is_published'] = $request->boolean('is_published', false);

        // Xử lý thời gian tạo
        if ($request->boolean('custom_date') && $request->filled('published_date_input')) {
            $date = Carbon::parse($request->input('published_date_input'));
            $validated['date'] = $date->format('M j, Y');
            $validated['published_date'] = $date->toIso8601String();
        }

        // Xóa các field tạm
        unset($validated['custom_date'], $validated['published_date_input']);

        $post->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        BlogPost::findOrFail($id)->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được xóa.');
    }
}
