<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
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
        return view('admin.blog.create');
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
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_published'] = $request->boolean('is_published', false);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['date'] = now()->format('M j, Y');
        $validated['published_date'] = now()->toIso8601String();

        BlogPost::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được tạo thành công.');
    }

    public function edit(string $id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('post'));
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
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $validated['is_published'] = $request->boolean('is_published', false);

        $post->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    public function destroy(string $id)
    {
        BlogPost::findOrFail($id)->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Bài viết đã được xóa.');
    }
}
