<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $post['meta_title'] ?? $post['title'] . ' - ' . \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</title>
    <meta name="description" content="{{ $post['meta_description'] ?? $post['excerpt'] }}">

    @if(isset($post['focus_keywords']))
    <meta name="keywords" content="{{ implode(', ', $post['focus_keywords']) }}">
    @endif

    <!-- Open Graph / Social Sharing -->
    <meta property="og:type"        content="article">
    <meta property="og:title"       content="{{ $post['meta_title'] ?? $post['title'] }}">
    <meta property="og:description" content="{{ $post['meta_description'] ?? $post['excerpt'] }}">
    <meta property="og:image"       content="{{ $post['image'] }}">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:site_name"   content="{{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $post['meta_title'] ?? $post['title'] }}">
    <meta name="twitter:description" content="{{ $post['meta_description'] ?? $post['excerpt'] }}">
    <meta name="twitter:image"       content="{{ $post['image'] }}">

    @if(isset($post['schema']))
    <script type="application/ld+json">
    {!! json_encode($post['schema'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    @endif

    <link rel="icon" type="image/png" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=4">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Prose styling for article content */
        .prose h2 { font-size: 2rem; font-weight: 800; margin-top: 2.5rem; margin-bottom: 1.25rem; color: #111827; letter-spacing: -0.025em; }
        .prose h3 { font-size: 1.5rem; font-weight: 700; margin-top: 2rem; margin-bottom: 1rem; color: #1f2937; }
        .prose p { margin-bottom: 1.5rem; font-size: 1.125rem; line-height: 1.8; color: #374151; }
        .prose ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 1.5rem; }
        .prose li { margin-bottom: 0.75rem; font-size: 1.125rem; color: #374151; line-height: 1.6; }
        .prose strong { font-weight: 700; color: #111827; }
        .prose a { color: #10b981; text-decoration: underline; text-underline-offset: 4px; }
        .prose a:hover { color: #047857; }
    </style>
</head>
<body class="min-h-screen bg-[#fcfbf8] font-sans text-[#171717] antialiased">
    <x-site.header :categories="$categories" />

    <main class="mx-auto max-w-[1440px] px-5 py-10 sm:px-8 sm:py-14 lg:px-10 lg:py-16">
        <!-- Breadcrumbs -->
        <nav class="mb-8 text-sm text-slate-500" aria-label="Breadcrumb">
            <a href="/" class="hover:text-[#047857] transition-colors">Home</a>
            <span class="mx-2">›</span>
            <a href="{{ route('blog.index') }}" class="hover:text-[#047857] transition-colors">Blog</a>
            <span class="mx-2">›</span>
            <span class="text-slate-900 font-medium truncate">{{ $post['title'] }}</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Main Article Content -->
            <article class="w-full lg:w-2/3 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-10">

                <!-- Article Header -->
                <header class="mb-10">
                    <span class="mb-4 inline-block rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-[#047857]">
                        {{ $post['category'] }}
                    </span>

                    <h1 class="mb-6 font-serif text-4xl font-bold leading-tight tracking-[-0.03em] text-[#171717] sm:text-5xl">
                        {{ $post['title'] }}
                    </h1>

                    <!-- Meta info -->
                    <div class="flex flex-wrap items-center gap-4 border-y border-slate-100 py-4 text-sm text-slate-500">
                        <div class="flex items-center gap-2">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#10b981] font-bold text-white">
                                {{ substr($post['author'] ?? 'E', 0, 1) }}
                            </div>
                            <span class="font-bold text-[#171717]">{{ $post['author'] ?? 'Editor' }}</span>
                        </div>
                        <span class="hidden h-1 w-1 rounded-full bg-slate-300 sm:inline-block"></span>
                        <span>{{ $post['date'] }}</span>
                        <span class="hidden h-1 w-1 rounded-full bg-slate-300 sm:inline-block"></span>
                        <span class="flex items-center">
                            <svg class="mr-1 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $post['read_time'] ?? '5 min read' }}
                        </span>
                    </div>
                </header>

                <!-- Featured Image -->
                <figure class="mb-10">
                    <img src="{{ $post['image'] }}" alt="{{ $post['image_alt'] ?? $post['title'] }}" class="w-full rounded-2xl object-cover">
                </figure>

                <!-- Article Body -->
                <div class="prose max-w-none">
                    {!! $post['content'] !!}
                </div>

                <!-- Buy Now CTA -->
                @if(!empty($post['affiliate_url']))
                <div class="mt-12 border-t border-slate-100 pt-8">
                    <div class="rounded-2xl bg-gradient-to-r from-emerald-50 to-[#f0faf6] p-6 text-center sm:p-8">
                        <p class="mb-2 text-sm font-semibold uppercase tracking-wider text-[#047857]">Interested in this product?</p>
                        <p class="mb-6 text-base text-slate-600">Check the latest price and availability on our partner store.</p>
                        <a href="{{ $post['affiliate_url'] }}" target="_blank" rel="sponsored nofollow noopener"
                           class="inline-flex items-center gap-2 rounded-xl bg-[#10b981] px-8 py-4 text-lg font-bold text-white shadow-lg shadow-emerald-200 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#047857] hover:shadow-emerald-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                            </svg>
                            Buy Now
                        </a>
                    </div>
                </div>
                @endif
            </article>

            <!-- Sidebar -->
            <aside class="w-full space-y-8 lg:w-1/3">
                <!-- Search Widget -->
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="mb-4 text-lg font-bold text-[#171717]">Search</h3>
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <input type="search" name="q" placeholder="Search articles..." class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-4 pr-10 text-sm outline-none transition focus:border-[#10b981] focus:ring-1 focus:ring-[#10b981]">
                        <button type="submit" class="absolute right-3 top-3.5">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </button>
                    </form>
                </div>

                <!-- Related Articles Widget -->
                @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h3 class="mb-6 text-lg font-bold text-[#171717]">Related Articles</h3>
                    <div class="space-y-6">
                        @foreach($relatedPosts as $related)
                        <a href="{{ route('blog.show', $related['slug']) }}" class="group flex gap-4">
                            <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-xl">
                                <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-110">
                            </div>
                            <div class="flex flex-col justify-center">
                                <h4 class="mb-1 line-clamp-2 text-sm font-bold text-[#171717] transition group-hover:text-[#047857]">
                                    {{ $related['title'] }}
                                </h4>
                                <span class="text-xs text-slate-500">{{ $related['date'] }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </aside>
        </div>
    </main>

    <footer class="mt-20 border-t border-slate-200 bg-[#171717] text-white">
        <div class="mx-auto grid max-w-[1440px] gap-8 px-4 py-12 sm:px-6 md:grid-cols-[1.5fr_1fr_1fr]">
            <div>
                <p class="text-xl font-bold">{{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</p>
                <p class="mt-3 max-w-md text-sm leading-6 text-stone-400">{{ \App\Models\SiteSetting::getValue('site_description', 'Independent reviews and useful buying guides.') }}</p>
            </div>
            <div>
                <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-300">Explore</p>
                <div class="grid gap-2 text-sm text-stone-400"><a href="{{ route('blog.index') }}">Reviews</a><a href="{{ route('contact') }}">Contact</a></div>
            </div>
            <div>
                <p class="mb-3 text-xs font-bold uppercase tracking-wider text-slate-300">Categories</p>
                <div class="grid gap-2 text-sm text-stone-400">
                    @foreach($categories->take(6) as $category)
                        <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-t border-white/15">
            <div class="mx-auto flex max-w-[1440px] flex-col gap-2 px-4 py-5 text-xs text-stone-500 sm:px-6 md:flex-row md:justify-between">
                <p>{{ \App\Models\SiteSetting::getValue('footer_text', '© 2026 All rights reserved.') }}</p>
                <p>{{ \App\Models\SiteSetting::getValue('footer_disclaimer', 'As an affiliate, we may earn commissions from qualifying purchases.') }}</p>
            </div>
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
