<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expert Wellness & Fitness Insights | {{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</title>
    <meta name="description" content="Discover expert wellness, home fitness insights, and smart health tools. Elevate your living space and well-being with our comprehensive guides and reviews.">
    <link rel="icon" type="image/png" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=4">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#fcfbf8] font-sans text-[#171717] antialiased">
    <x-site.header :categories="$categories" />

    <!-- Blog Hero -->
    <div class="bg-[#171717] px-5 py-16 sm:px-8 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-[1440px] text-center">
            <h1 class="font-serif text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
                Expert Wellness & Fitness Insights
            </h1>
            <p class="mx-auto mt-5 max-w-3xl text-lg leading-relaxed text-stone-400">
                Discover actionable advice, deep-dive reviews, and expert tips to optimize your home fitness routine, maintain a healthy living space, and choose the best tools for your well-being.
            </p>
        </div>
    </div>

    <!-- Blog Grid -->
    <main class="mx-auto max-w-[1440px] px-5 py-10 sm:px-8 sm:py-14 lg:px-10 lg:py-16">
        @if(count($posts) > 0)
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-[0_8px_30px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(15,118,110,0.11)]">
                    <a href="{{ route('blog.show', $post['slug']) }}" class="block aspect-[16/10] overflow-hidden bg-slate-100">
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    </a>
                    <div class="p-6">
                        <div class="mb-3 flex items-center gap-3">
                            <span class="text-[11px] font-bold uppercase tracking-[0.16em] text-[#047857]">{{ $post['category'] ?? 'Review' }}</span>
                            <span class="text-xs text-slate-400">{{ $post['date'] }}</span>
                        </div>
                        <h2 class="mb-3 line-clamp-2 text-xl font-bold leading-[1.15] tracking-[-0.025em] text-slate-950">
                            <a href="{{ route('blog.show', $post['slug']) }}" class="transition hover:text-[#047857]">{{ $post['title'] }}</a>
                        </h2>
                        <p class="mb-5 line-clamp-3 text-sm leading-6 text-slate-600">{{ $post['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $post['slug']) }}" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wide text-[#047857]">Read more <span aria-hidden="true">→</span></a>
                    </div>
                </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border border-dashed border-slate-300 px-6 py-12 text-center text-sm text-stone-500">No articles are available yet.</div>
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
