<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'image' => asset('images/peak-performance-fitness.jpg'),
            'title' => 'Peak Performance at Home',
            'subtitle' => 'Premium supplements and equipment to crush your fitness goals.',
        ];

        return view('pages.product_list', compact('products', 'banner'));
    }

    public function health()
    {
        $products = $this->getProductsByCategory('health');

        $banner = [
            'image' => asset('images/healthier-sanctuary-home.jpg'),
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
