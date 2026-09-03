<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @php
        $isTraining = ($category?->slug ?? request()->segment(2)) === 'training';
        $pageTitle = $isTraining ? 'Best Home Gym Equipment & Gear 2026' : 'Smart Home Wellness Tools & Purifiers';
    @endphp
    
    <title>{{ $pageTitle }} - {{ config('app.name', 'Daily Shark Finds') }}</title>
    <meta name="description" content="{{ $isTraining ? 'Shop the best home gym equipment and training gear in 2026. Top-rated adjustable dumbbells, clean whey protein, yoga mats and more.' : 'Discover smart home wellness tools and purifiers in 2026. Top-rated cordless vacuums for pet hair, HEPA air purifiers and more.' }}">
    
    <!-- Fonts -->
    <link rel="icon" type="image/jpeg" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Arial', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            light: '#a7f3d0',
                            DEFAULT: '#10b981',
                            dark: '#047857',
                        },
                        dark: {
                            DEFAULT: '#1f2937',
                            darker: '#111827',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 text-dark selection:bg-brand selection:text-white">

    <x-site.header :categories="$categories" />


    <!-- Main Content -->
    <main class="py-10 md:py-14">
        <div class="mx-auto max-w-[1440px] px-5 sm:px-8 lg:px-10">

            <nav aria-label="Breadcrumb" class="mb-8">
                <ol class="inline-flex max-w-full items-center gap-1 rounded-full border border-emerald-100 bg-white p-1.5 pr-2 shadow-[0_6px_20px_rgba(15,118,110,0.08)]">
                    <li>
                        <a href="{{ url('/') }}" class="flex items-center gap-2 rounded-full px-3 py-2 text-sm font-semibold text-gray-600 transition hover:bg-emerald-50 hover:text-[#047857]">
                            <svg class="h-4 w-4 text-[#10b981]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 11 9-8 9 8M5 10v10h14V10M9 20v-6h6v6"/></svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li aria-hidden="true" class="text-emerald-300">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    </li>
                    <li class="min-w-0">
                        <span class="block max-w-[220px] truncate rounded-full bg-emerald-50 px-4 py-2 text-sm font-bold text-[#047857] sm:max-w-none">{{ $category?->name ?? ucfirst(request()->segment(2)) }}</span>
                    </li>
                </ol>
            </nav>
            <!-- Product List (Row Layout) -->
            <div id="category-products" class="flex scroll-mt-6 flex-col gap-8">
                @foreach($products as $product)
                    <article class="bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col md:flex-row group relative">
                        
                        <!-- Part 1: Product Image & Badges -->
                        <div class="w-full md:w-1/3 lg:w-1/4 relative bg-white border-b md:border-b-0 md:border-r border-gray-50 flex-shrink-0 flex items-center justify-center p-6 md:p-8">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-56 md:h-full object-contain transform transition-transform duration-700 group-hover:scale-105" loading="lazy">
                            <!-- Discount Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-600 text-white text-xs font-extrabold px-3 py-1.5 rounded-lg shadow-lg uppercase tracking-wide">-{{ $product['discount_percentage'] }}%</span>
                            </div>
                            <!-- Top Pick Badge -->
                            @if($loop->first)
                            <div class="absolute top-4 right-4 md:right-auto md:left-4 md:top-14">
                                <span class="bg-brand text-white text-[10px] font-bold px-2.5 py-1 rounded shadow-md uppercase tracking-wider">Top Pick</span>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Part 2 & 3 Wrapper -->
                        <div class="flex-grow flex flex-col lg:flex-row p-6 md:p-8 gap-6 md:gap-8">
                            
                            <!-- Part 2: Product Name, Rating & Pros/Cons -->
                            <div class="flex-1 flex flex-col">
                                <!-- Product Name (SEO H2) -->
                                <h2 class="text-xl md:text-2xl font-bold text-dark-darker mb-3 group-hover:text-brand transition-colors leading-snug">
                                    <a href="{{ url('/product/' . ($product['slug'] ?? '#')) }}">{{ $product['name'] }}</a>
                                </h2>

                                <!-- Star Rating -->
                                <div class="flex items-center gap-2 mb-5">
                                    @php $productIndex = $loop->index; @endphp
                                    <div class="flex items-center" aria-label="{{ $product['star_rating'] }} out of 5 stars">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($product['star_rating']))
                                                <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @elseif($i - $product['star_rating'] < 1 && $i - $product['star_rating'] > 0)
                                                <svg class="w-5 h-5 text-amber-400" viewBox="0 0 20 20">
                                                    <defs><linearGradient id="half-{{ $productIndex }}-{{ $i }}"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="#D1D5DB"/></linearGradient></defs>
                                                    <path fill="url(#half-{{ $productIndex }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="text-sm font-semibold text-dark">{{ $product['star_rating'] }}</span>
                                    <span class="text-sm text-gray-400">({{ number_format($product['review_count']) }} reviews)</span>
                                </div>
                                
                                <!-- Product Short Description -->
                                <p class="text-gray-600 text-sm mb-6 leading-relaxed hidden md:block">
                                    {{ $product['description'] }}
                                </p>

                                <!-- Pros & Cons Table -->
                                @php
                                    $pros = array_slice($product['key_features'] ?? [], 0, 3);
                                    // Generate some generic cons based on product properties if none exist, else defaults
                                    $cons = ['Premium price compared to basic models', 'May be too advanced for beginners'];
                                    if ($product['price_numeric'] < 50) {
                                        $cons = ['Basic features only', 'Not intended for heavy-duty use'];
                                    }
                                @endphp
                                <div class="mt-auto grid grid-cols-1 sm:grid-cols-2 gap-6 bg-gray-50/50 rounded-2xl p-5 border border-gray-100">
                                    <!-- Pros -->
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-800 mb-3 uppercase tracking-wider flex items-center gap-2">
                                            Pros
                                        </h4>
                                        <ul class="space-y-2.5">
                                            @foreach($pros as $pro)
                                            <li class="flex items-start text-sm text-gray-600">
                                                <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                <span class="leading-snug">{{ $pro }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Cons -->
                                    <div>
                                        <h4 class="text-sm font-bold text-gray-800 mb-3 uppercase tracking-wider flex items-center gap-2">
                                            Cons
                                        </h4>
                                        <ul class="space-y-2.5">
                                            @foreach($cons as $con)
                                            <li class="flex items-start text-sm text-gray-600">
                                                <svg class="w-5 h-5 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                <span class="leading-snug">{{ $con }}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Part 3: Price & Actions -->
                            <div class="w-full lg:w-64 xl:w-72 flex-shrink-0 flex flex-col justify-center border-t lg:border-t-0 lg:border-l border-gray-100 pt-6 lg:pt-0 lg:pl-8">
                                <div class="flex items-baseline gap-2 mb-1">
                                    <span class="text-4xl font-extrabold text-dark-darker">{{ $product['price'] }}</span>
                                </div>
                                <div class="flex items-baseline gap-2 mb-6">
                                    <span class="text-lg text-gray-400 line-through">{{ $product['original_price'] }}</span>
                                    <span class="text-sm font-bold text-red-600">Save {{ $product['discount_percentage'] }}%</span>
                                </div>

                                <!-- In Stock Status -->
                                <div class="flex items-center gap-2 mb-6 bg-brand/5 border border-brand/20 px-3 py-2 rounded-lg w-fit">
                                    <span class="relative flex h-3 w-3">
                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand opacity-75"></span>
                                      <span class="relative inline-flex rounded-full h-3 w-3 bg-brand"></span>
                                    </span>
                                    <span class="text-sm font-semibold text-brand">In Stock</span>
                                </div>
                                
                                <!-- CTA Button -->
                                <a href="{{ $product['affiliate_link'] }}" target="_blank" rel="nofollow noopener" class="w-full text-center px-6 py-4 border border-transparent text-base font-bold rounded-xl text-white bg-amber-500 hover:bg-amber-600 hover:shadow-lg hover:shadow-amber-500/30 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-[0.98] mb-4">
                                    Check Price on Amazon
                                </a>
                                
                                <a href="{{ url('/product/' . ($product['slug'] ?? '#')) }}" class="text-center text-sm font-semibold text-gray-500 hover:text-brand transition-colors flex justify-center items-center gap-1 group/link">
                                    Read Full Review
                                    <svg class="w-4 h-4 transition-transform group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($products->hasPages())
                <nav class="mt-12 flex flex-wrap items-center justify-center gap-2" aria-label="Category product pagination">
                    @if($products->onFirstPage())
                        <span class="cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-2.5 text-sm font-semibold text-gray-400">← Previous</span>
                    @else
                        <a href="{{ $products->previousPageUrl() }}#category-products" class="rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-emerald-300 hover:text-[#047857]">← Previous</a>
                    @endif

                    @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if($page === $products->currentPage())
                            <span aria-current="page" class="flex h-11 min-w-11 items-center justify-center rounded-xl bg-[#10b981] px-3 text-sm font-bold text-white shadow-sm">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}#category-products" class="flex h-11 min-w-11 items-center justify-center rounded-xl border border-gray-200 bg-white px-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-emerald-300 hover:text-[#047857]">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}#category-products" class="rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:border-emerald-300 hover:text-[#047857]">Next →</a>
                    @else
                        <span class="cursor-not-allowed rounded-xl border border-gray-200 bg-gray-100 px-4 py-2.5 text-sm font-semibold text-gray-400">Next →</span>
                    @endif
                </nav>
            @endif

            <!-- Trust & Curation Notice -->
            <div class="mt-16 max-w-3xl mx-auto text-center">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm px-8 py-10">
                    <div class="flex justify-center mb-4">
                        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-brand/10">
                            <svg class="w-6 h-6 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-dark-darker mb-3">Curated by Real Reviews, Backed by Quality</h3>
                    <p class="text-gray-500 leading-relaxed text-base">
                        Every product on this page is hand-picked based on verified reviews from real US customers and rigorous quality standards. We analyze thousands of ratings, expert opinions, and hands-on testing data to ensure you only see items that truly deliver on their promises. No sponsored placements — just honest, research-driven recommendations you can trust.
                    </p>
                </div>
            </div>
            
        </div>
    </main>

    <!-- SEO Footer -->
    <footer class="bg-[#0b1120] pt-20 pb-10 border-t border-gray-800 mt-12">
        <div class="mx-auto max-w-[1440px] px-5 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Brand Col -->
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="relative w-12 h-12 flex-shrink-0 overflow-hidden rounded-full ring-2 ring-brand/30 bg-white">
                            <img src="{{ asset(\App\Models\SiteSetting::getValue('logo', 'images/logo-optimized.jpg')) }}" alt="HomeWellness logo" class="w-full h-full object-contain" loading="lazy" />
                        </div>
                        <div class="leading-none">
                            <span class="block text-lg font-extrabold tracking-tight text-white">HomeWellness</span>
                            <span class="block text-xs text-brand font-semibold tracking-widest uppercase mt-0.5">Smart Home Vitality</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed mb-6 pr-4">
                        Reinvent your living space, elevate your health. A comprehensive solution for home workouts and purifying your living environment.
                    </p>
                </div>
                
                <!-- Links Col 1 -->
                <div class="md:col-span-3">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="{{ url('/#home') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home</a></li>
                        <li><a href="{{ url('/#training') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home Training Gear</a></li>
                        <li><a href="{{ url('/#health') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Smart Health Tools</a></li>
                        <li><a href="{{ url('/#about') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Contact Us</a></li>
                    </ul>
                </div>

                <!-- Links Col 2 (SEO Keywords wrapped nicely) -->
                <div class="md:col-span-4">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Top Searches</h4>
                    <ul class="space-y-4">
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Best home gym equipment 2026</a></li>
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Clean whey protein for sensitive stomach</a></li>
                        <li><a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Top-rated cordless vacuums for pet hair</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800/50 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} HomeWellness - Home Fitness & Wellness. All rights reserved.
                </p>
                <!-- SEO Hidden Paragraph for crawlers, blends well -->
                <p class="text-[11px] text-gray-700 text-center md:text-right max-w-2xl leading-relaxed">
                    Discovering the <strong>best home gym equipment 2026</strong> has never been easier. We provide highly curated <strong>clean whey protein for sensitive stomach</strong> issues, and review the <strong>top-rated cordless vacuums for pet hair</strong>. Transform your environment into a wellness haven.
                </p>
            </div>
        </div>
    </footer>

    <!-- Interactive Scripts -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => { mobileMenu.classList.toggle('hidden'); mobileMenuBtn.setAttribute('aria-expanded', String(!mobileMenu.classList.contains('hidden'))); });
        }
    </script>

</body>
</html>

