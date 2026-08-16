<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Campaign;
use App\Models\Click;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'blog_posts' => BlogPost::count(),
            'users' => User::count(),
            'campaigns' => Campaign::count(),
            'clicks_today' => Click::whereDate('created_at', today())->count(),
            'clicks_total' => Click::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
