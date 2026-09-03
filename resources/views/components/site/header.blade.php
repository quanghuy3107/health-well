@props(['categories' => collect()])

<header class="border-b border-emerald-100 bg-white shadow-sm">
    <div class="mx-auto max-w-[1440px] px-4 sm:px-6">
        <div class="flex min-h-24 items-center justify-between gap-5 py-4">
            <a href="/" class="flex min-w-0 items-center gap-3">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-full border border-emerald-100 bg-white shadow-sm sm:h-14 sm:w-14">
                    <img src="{{ asset(\App\Models\SiteSetting::getValue('logo', 'images/logo-optimized.jpg')) }}" alt="Logo" class="h-full w-full object-contain">
                </span>
                <span class="truncate text-xl font-bold tracking-[-0.03em] text-[#171717] sm:text-2xl lg:text-[1.75rem]">{{ \App\Models\SiteSetting::getValue('site_name', 'Daily Shark Finds') }}</span>
            </a>

            <form action="{{ route('search') }}" method="GET" role="search" class="hidden w-full max-w-[520px] lg:block">
                <label for="site-search" class="sr-only">Search products and reviews</label>
                <div class="flex h-12 items-center rounded-full border border-emerald-200 bg-emerald-50/50 p-1 pl-5 transition focus-within:border-[#10b981] focus-within:bg-white focus-within:ring-4 focus-within:ring-emerald-100">
                    <input id="site-search" name="q" type="search" value="{{ request('q') }}" maxlength="100" placeholder="Search products and reviews..." class="min-w-0 flex-1 border-0 bg-transparent text-sm text-[#171717] outline-none placeholder:text-slate-400">
                    <button type="submit" aria-label="Submit search" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#10b981] text-white transition hover:bg-[#047857]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                    </button>
                </div>
            </form>

            <div class="hidden shrink-0 items-center gap-2 xl:flex" aria-label="Partner networks">
                @foreach(['AW', 'UB', 'MP', 'AZ'] as $partner)
                    <span class="flex h-10 w-10 items-center justify-center rounded-full border border-emerald-100 bg-emerald-50 text-[10px] font-bold tracking-wide text-[#047857]">{{ $partner }}</span>
                @endforeach
            </div>

            <button id="mobile-menu-btn" type="button" class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#10b981] text-white lg:hidden" aria-label="Toggle menu" aria-expanded="false">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </div>

    <div class="border-t border-emerald-100 bg-[#f4fdf9]">
        <nav class="mx-auto hidden max-w-[1440px] flex-wrap items-center justify-center gap-x-7 gap-y-2 px-6 py-3 text-sm font-semibold lg:flex" aria-label="Main navigation">
            @foreach($categories as $category)
                <a href="{{ route('category.show', $category->slug) }}" class="whitespace-nowrap py-1 text-[#26342e] transition-colors hover:text-[#047857]">{{ $category->name }}</a>
            @endforeach
            <a href="{{ route('blog.index') }}" class="whitespace-nowrap py-1 text-[#26342e] transition-colors hover:text-[#047857]">Reviews</a>
            <a href="{{ route('contact') }}" class="whitespace-nowrap py-1 text-[#26342e] transition-colors hover:text-[#047857]">Contact</a>
        </nav>

        <nav id="mobile-menu" class="mx-auto hidden max-w-[1440px] px-4 py-4 sm:px-6 lg:hidden">
            <form action="{{ route('search') }}" method="GET" role="search" class="flex h-12 items-center rounded-full border border-emerald-200 bg-white p-1 pl-4 shadow-sm">
                <label for="mobile-site-search" class="sr-only">Search products and reviews</label>
                <input id="mobile-site-search" name="q" type="search" value="{{ request('q') }}" maxlength="100" placeholder="Search products and reviews..." class="min-w-0 flex-1 border-0 bg-transparent text-sm outline-none">
                <button type="submit" aria-label="Submit search" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#10b981] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                </button>
            </form>
            <div class="mt-4 grid grid-cols-1 gap-1 border-t border-emerald-100 pt-3 sm:grid-cols-2">
                @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-[#26342e] hover:bg-emerald-100 hover:text-[#047857]">{{ $category->name }}</a>
                @endforeach
                <a href="{{ route('blog.index') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-[#26342e] hover:bg-emerald-100 hover:text-[#047857]">Reviews</a>
                <a href="{{ route('contact') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-[#26342e] hover:bg-emerald-100 hover:text-[#047857]">Contact</a>
            </div>
        </nav>
    </div>
</header>
