<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        try {
            $posts = BlogPost::published()
                ->orderBy('sort_order')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(function ($post) {
                    $post->image = asset($post->image);
                    return $post;
                })
                ->toArray();
        } catch (\Exception $e) {
            $posts = [];
        }

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        try {
            $post = BlogPost::published()->where('slug', $slug)->first();

            if (!$post) {
                abort(404);
            }

            $post->image = asset($post->image);
            $post = $post->toArray();

            $posts = BlogPost::published()
                ->where('slug', '!=', $slug)
                ->take(3)
                ->get()
                ->map(function ($p) {
                    $p->image = asset($p->image);
                    return $p;
                })
                ->toArray();

            $relatedPosts = collect($posts);
        } catch (\Exception $e) {
            abort(404);
        }

        return view('blog.show', compact('post', 'relatedPosts', 'posts'));
    }
}
