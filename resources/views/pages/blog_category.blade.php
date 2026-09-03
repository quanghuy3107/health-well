<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $category->name }} - {{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</title>
    <meta name="description" content="{{ $category->description ?? 'Browse all articles in ' . $category->name }}">
    <link rel="icon" type="image/png" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=4">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#fcfbf8] font-sans text-[#171717] antialiased">
    <x-site.header :categories="$categories" />

    <main class="mx-auto max-w-[1440px] px-5 py-10 sm:px-8 sm:py-14 lg:px-10 lg:py-16">
        <!-- Category Header -->
        <div class="mb-10">
            <nav class="mb-4 text-sm text-slate-500" aria-label="Breadcrumb">
                <a href="/" class="hover:text-[#047857] transition-colors">Home</a>
                <span class="mx-2">›</span>
                <span class="text-slate-900 font-medium">{{ $category->name }}</span>
            </nav>
            <h1 class="font-serif text-4xl font-bold leading-none tracking-[-0.025em] text-[#171717] sm:text-5xl lg:text-6xl">{{ $category->name }}</h1>
            @if($category->description)
                <p class="mt-3 max-w-2xl text-lg text-slate-600">{{ $category->description }}</p>
            @endif
            <p class="mt-4 rounded-full inline-flex bg-emerald-50 px-4 py-2 text-sm font-semibold text-[#047857]">{{ $posts->total() }} articles</p>
        </div>

        <!-- Posts Grid -->
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                    <x-site.article-card :post="$post" />
                @endforeach
            </div>

            @if($posts->hasPages())
                <nav class="mt-10 flex flex-wrap items-center justify-center gap-2" aria-label="Pagination">
                    @if($posts->onFirstPage())
                        <span class="cursor-not-allowed rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-400">← Previous</span>
                    @else
                        <a href="{{ $posts->previousPageUrl() }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-emerald-300 hover:text-[#047857]">← Previous</a>
                    @endif

                    @foreach($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                        @if($page === $posts->currentPage())
                            <span aria-current="page" class="flex h-11 min-w-11 items-center justify-center rounded-xl bg-[#10b981] px-3 text-sm font-bold text-white shadow-sm">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="flex h-11 min-w-11 items-center justify-center rounded-xl border border-slate-200 bg-white px-3 text-sm font-semibold text-slate-700 transition hover:border-emerald-300 hover:text-[#047857]">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($posts->hasMorePages())
                        <a href="{{ $posts->nextPageUrl() }}" class="rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-emerald-300 hover:text-[#047857]">Next →</a>
                    @else
                        <span class="cursor-not-allowed rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-400">Next →</span>
                    @endif
                </nav>
            @endif
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 px-6 py-12 text-center text-sm text-stone-500">No articles found in this category yet.</div>
        @endif
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
                    @foreach($categories->take(6) as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a>
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
