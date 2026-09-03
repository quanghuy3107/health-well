<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $term !== '' ? 'Search: '.$term : 'Search' }} | {{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</title>
    <meta name="robots" content="noindex,follow">
    <link rel="icon" type="image/png" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=4">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#fcfbf8] font-sans text-[#171717] antialiased">
    <x-site.header :categories="$categories" />

    <main class="mx-auto max-w-[1440px] px-4 py-10 sm:px-6 sm:py-14">
        <p class="mb-2 text-xs font-bold uppercase tracking-[0.18em] text-[#047857]">Discover</p>
        <h1 class="font-serif text-5xl font-bold leading-none tracking-[-0.03em] sm:text-6xl">Search</h1>

        <form action="{{ route('search') }}" method="GET" role="search" class="mt-8 flex max-w-2xl border border-[#bdb8af] bg-white">
            <label for="search-page-query" class="sr-only">Search products and reviews</label>
            <input id="search-page-query" name="q" type="search" value="{{ $term }}" maxlength="100" placeholder="Search products and reviews..." class="min-w-0 flex-1 border-0 bg-transparent px-4 py-3 text-sm outline-none" autofocus>
            <button type="submit" class="bg-[#10b981] px-6 text-xs font-bold uppercase tracking-wide text-white transition hover:bg-[#047857]">Search</button>
        </form>

        @if($term === '')
            <div class="mt-12 border border-dashed border-[#cfcac2] px-6 py-14 text-center text-sm text-[#66625d]">Enter a product, category or review topic to begin searching.</div>
        @elseif($products->isEmpty() && $posts->isEmpty())
            <div class="mt-12 border border-dashed border-[#cfcac2] px-6 py-14 text-center">
                <p class="font-serif text-3xl font-bold">No results found</p>
                <p class="mt-2 text-sm text-[#66625d]">Try a shorter or more general keyword.</p>
            </div>
        @else
            @if($products->isNotEmpty())
                <section class="mt-14" aria-labelledby="search-products-title">
                    <div class="mb-6 flex items-end justify-between border-b border-[#d8d4cd] pb-4">
                        <h2 id="search-products-title" class="font-serif text-4xl font-bold">Products</h2>
                        <span class="text-xs font-bold uppercase tracking-wide text-[#66625d]">{{ $products->count() }} results</span>
                    </div>
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        @foreach($products as $product)
                            <x-site.product-card :product="$product" />
                        @endforeach
                    </div>
                </section>
            @endif

            @if($posts->isNotEmpty())
                <section class="mt-16" aria-labelledby="search-posts-title">
                    <div class="mb-6 flex items-end justify-between border-b border-[#d8d4cd] pb-4">
                        <h2 id="search-posts-title" class="font-serif text-4xl font-bold">Reviews & guides</h2>
                        <span class="text-xs font-bold uppercase tracking-wide text-[#66625d]">{{ $posts->count() }} results</span>
                    </div>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-10 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($posts as $post)
                            <x-site.article-card :post="$post" />
                        @endforeach
                    </div>
                </section>
            @endif
        @endif
    </main>

    <footer class="mt-20 border-t border-white/15 bg-[#171717]">
        <div class="mx-auto max-w-[1440px] px-4 py-7 text-xs text-stone-400 sm:px-6">
            {{ \App\Models\SiteSetting::getValue('footer_text', '© 2026 All rights reserved.') }}
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function () {
            const menu = document.getElementById('mobile-menu');
            menu?.classList.toggle('hidden');
            this.setAttribute('aria-expanded', String(!menu?.classList.contains('hidden')));
        });
    </script>
</body>
</html>
