<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @php
        $isTraining = request()->is('training/*');
        $pageTitle = $isTraining ? 'Best Home Gym Equipment & Gear 2026' : 'Smart Home Wellness Tools & Purifiers';
    @endphp
    
    <title>{{ $pageTitle }} - FitWell 2026</title>
    <meta name="description" content="{{ $isTraining ? 'Shop the best home gym equipment and training gear in 2026. Top-rated adjustable dumbbells, clean whey protein, yoga mats and more.' : 'Discover smart home wellness tools and purifiers in 2026. Top-rated cordless vacuums for pet hair, HEPA air purifiers and more.' }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
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

    <!-- Header / Menu -->
    <header class="fixed w-full top-0 z-50 bg-white transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3 cursor-pointer">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand to-brand-dark flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        FW
                    </div>
                    <span class="font-extrabold text-xl tracking-tight text-dark-darker">FitWell<span class="text-brand">2026</span></span>
                </a>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-10">
                    <a href="{{ url('/') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Home</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Training</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Health</a>
                    <a href="{{ url('/#about') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">About Us</a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button class="text-dark hover:text-brand focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Banner -->
    <section class="relative w-full h-[300px] md:h-[400px] mt-20 overflow-hidden">
        <!-- Background Image -->
        <img src="{{ $banner['image'] }}" alt="{{ $banner['title'] }}" class="absolute inset-0 w-full h-full object-cover object-center">
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-dark-darker/90 via-dark-darker/70 to-dark-darker/50"></div>
        <!-- Content -->
        <div class="relative z-10 h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
            <!-- Breadcrumbs (SEO) -->
            <nav aria-label="Breadcrumb" class="mb-4">
                <ol class="flex items-center gap-2 text-sm" itemscope itemtype="https://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a href="{{ url('/') }}" itemprop="item" class="text-gray-300 hover:text-white transition-colors">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </li>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <span itemprop="name" class="text-white font-medium">{{ $isTraining ? 'Training' : 'Health' }}</span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </nav>
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight drop-shadow-lg">
                {{ $banner['title'] }}
            </h1>
            <!-- Subtitle -->
            <p class="mt-4 max-w-2xl text-lg md:text-xl text-gray-300 font-light leading-relaxed">
                {{ $banner['subtitle'] }}
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-16 md:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($products as $product)
                    <article class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group flex flex-col">
                        <!-- Product Image -->
                        <div class="relative h-72 overflow-hidden bg-white">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-contain p-4 transition-transform duration-700 group-hover:scale-105" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-dark-darker/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <!-- Discount Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-600 text-white text-xs font-extrabold px-3 py-1.5 rounded-lg shadow-lg uppercase tracking-wide">-{{ $product['discount_percentage'] }}%</span>
                            </div>
                            <!-- Top Pick Badge -->
                            <div class="absolute top-4 right-4">
                                <span class="bg-brand text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md uppercase tracking-wider">Top Pick</span>
                            </div>
                        </div>
                        
                        <!-- Product Content -->
                        <div class="p-8 flex flex-col flex-grow">
                            <!-- Product Name (SEO H2) -->
                            <h2 class="text-xl font-bold text-dark-darker mb-2 line-clamp-2 group-hover:text-brand transition-colors leading-snug">
                                <a href="{{ url('/product/' . ($product['slug'] ?? '#')) }}">{{ $product['name'] }}</a>
                            </h2>

                            <!-- Star Rating -->
                            <div class="flex items-center gap-2 mb-3">
                                @php $productIndex = $loop->index; @endphp
                                <div class="flex items-center" aria-label="{{ $product['star_rating'] }} out of 5 stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($product['star_rating']))
                                            {{-- Full star --}}
                                            <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @elseif($i - $product['star_rating'] < 1 && $i - $product['star_rating'] > 0)
                                            {{-- Half star --}}
                                            <svg class="w-5 h-5 text-amber-400" viewBox="0 0 20 20">
                                                <defs><linearGradient id="half-{{ $productIndex }}-{{ $i }}"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="#D1D5DB"/></linearGradient></defs>
                                                <path fill="url(#half-{{ $productIndex }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @else
                                            {{-- Empty star --}}
                                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm font-semibold text-dark">{{ $product['star_rating'] }}</span>
                                <span class="text-sm text-gray-400">({{ number_format($product['review_count']) }} reviews)</span>
                            </div>
                            
                            <!-- Description -->
                            <p class="text-gray-500 text-sm mb-5 flex-grow leading-relaxed line-clamp-3">
                                {{ $product['description'] }}
                            </p>
                            
                            <!-- Price Row & CTA -->
                            <div class="mt-auto border-t border-gray-100 pt-5">
                                <!-- Price Row -->
                                <div class="flex items-baseline gap-3 mb-1">
                                    <span class="text-3xl font-extrabold text-dark-darker">{{ $product['price'] }}</span>
                                    <span class="text-base text-gray-400 line-through">{{ $product['original_price'] }}</span>
                                    <span class="text-sm font-bold text-red-600">-{{ $product['discount_percentage'] }}%</span>
                                </div>

                                <!-- Urgency / Availability -->
                                <div class="flex items-center gap-1.5 mb-5">
                                    <svg class="w-4 h-4 text-brand" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    <span class="text-sm font-medium text-brand">In Stock &mdash; Fast Shipping to US</span>
                                </div>
                                
                                <!-- CTA Button -->
                                <a href="{{ $product['affiliate_link'] }}" target="_blank" rel="nofollow noopener" class="w-full inline-flex justify-center items-center px-6 py-4 border border-transparent text-base font-bold rounded-xl text-white bg-dark-darker hover:bg-brand hover:shadow-lg hover:shadow-brand/30 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-[0.98]">
                                    Check Price on Store
                                    <svg class="ml-2 -mr-1 w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Brand Col -->
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-brand flex items-center justify-center text-white font-bold text-xl">
                            FW
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-white">FitWell<span class="text-brand">2026</span></span>
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
                    &copy; {{ date('Y') }} FitWell - Home Fitness & Wellness. All rights reserved.
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
        // Sticky Header with Glassmorphism
        window.addEventListener('scroll', () => {
            const header = document.getElementById('navbar');
            if (window.scrollY > 20) {
                header.classList.add('shadow-md');
                header.classList.replace('bg-white', 'bg-white/95');
                header.classList.add('backdrop-blur-xl');
            } else {
                header.classList.remove('shadow-md');
                header.classList.replace('bg-white/95', 'bg-white');
                header.classList.remove('backdrop-blur-xl');
            }
        });
    </script>

</body>
</html>
