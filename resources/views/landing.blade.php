<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ \App\Models\SiteSetting::getValue('meta_title', 'Best Product Reviews & Deals 2026') }}</title>
    <meta name="description" content="{{ \App\Models\SiteSetting::getValue('meta_description', 'Expert product reviews, comparisons, and the best deals. Find the perfect products with our in-depth analysis and honest recommendations.') }}">

    <link rel="icon" type="image/png" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { light: '#a7f3d0', DEFAULT: '#10b981', dark: '#047857' },
                        dark: { DEFAULT: '#1f2937', darker: '#111827' }
                    }
                }
            }
        }
    </script>
    <style>
        .glass { background: rgba(255,255,255,0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.2); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-dark selection:bg-brand selection:text-white">

    <!-- Header -->
    <header class="fixed w-full top-0 z-50 glass transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="/" class="flex items-center gap-2.5 group">
                    <div class="w-10 h-10 md:w-12 md:h-12 overflow-hidden rounded-full shadow-md ring-2 ring-brand/20 bg-white">
                        <img src="{{ asset(\App\Models\SiteSetting::getValue('logo', 'images/logo-optimized.jpg')) }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="leading-none">
                        <span class="block text-base md:text-lg font-extrabold text-dark-darker group-hover:text-brand transition-colors">{{ \App\Models\SiteSetting::getValue('site_name', 'ReviewHub') }}</span>
                        <span class="block text-[10px] md:text-xs text-brand font-semibold tracking-widest uppercase">{{ \App\Models\SiteSetting::getValue('site_tagline', 'Honest Reviews') }}</span>
                    </div>
                </a>

                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-dark font-medium hover:text-brand transition-colors">Home</a>
                    @foreach($categories->take(4) as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}" class="text-dark font-medium hover:text-brand transition-colors">{{ $cat->name }}</a>
                    @endforeach
                    <a href="{{ route('blog.index') }}" class="text-dark font-medium hover:text-brand transition-colors">Blog</a>
                    <a href="{{ route('contact') }}" class="text-dark font-medium hover:text-brand transition-colors">Contact</a>
                </nav>

                <button id="mobile-menu-btn" class="md:hidden text-dark hover:text-brand p-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <nav class="flex flex-col gap-1">
                    <a href="/" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5">Home</a>
                    @foreach($categories as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5">{{ $cat->name }}</a>
                    @endforeach
                    <a href="{{ route('blog.index') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5">Blog</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section class="relative pt-32 pb-20 lg:pt-44 lg:pb-32 overflow-hidden min-h-[85vh] flex items-center">
        <div class="absolute inset-0 bg-gradient-to-br from-dark-darker via-dark-darker/95 to-brand/20"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%2310b981&quot; fill-opacity=&quot;0.3&quot;%3E%3Ccircle cx=&quot;1&quot; cy=&quot;1&quot; r=&quot;1&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-block px-4 py-1.5 rounded-full bg-brand/20 border border-brand/30 mb-6">
                <span class="text-brand-light font-semibold tracking-wider uppercase text-sm">Trusted Product Reviews</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                Find The <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-light to-brand">Best Products</span><br class="hidden lg:block">
                With Honest Reviews
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300 mb-10 leading-relaxed">
                We test, compare, and review products across every category so you can make informed buying decisions. No fluff, just facts.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#products" class="inline-flex justify-center items-center px-8 py-4 text-base font-semibold rounded-full shadow-lg text-white bg-brand hover:bg-brand-dark transition-all duration-300 transform hover:-translate-y-1">
                    Browse Products
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </a>
                <a href="{{ route('blog.index') }}" class="inline-flex justify-center items-center px-8 py-4 border-2 border-white/80 text-base font-semibold rounded-full text-white hover:bg-white hover:text-dark-darker transition-all duration-300 transform hover:-translate-y-1">
                    Read Reviews
                </a>
            </div>
        </div>
    </section>

    <!-- Categories -->
    @if($categories->count() > 0)
    <section class="py-20 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">Categories</h2>
                <p class="mt-2 text-3xl font-extrabold text-dark-darker sm:text-4xl">Browse By Category</p>
                <div class="w-16 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-{{ min($categories->count(), 4) }} gap-6">
                @foreach($categories as $cat)
                <a href="{{ route('category.show', $cat->slug) }}" class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 aspect-[4/3]">
                    <img src="{{ asset($cat->image ?? 'images/modern-clean-home.jpg') }}" alt="{{ $cat->name }}" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-darker/90 via-dark-darker/30 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <h3 class="text-lg font-bold text-white">{{ $cat->name }}</h3>
                        <p class="text-sm text-gray-300 mt-1">{{ $cat->description ?? 'View products' }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Products -->
    <section id="products" class="py-20 bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">Top Picks</h2>
                <p class="mt-2 text-3xl font-extrabold text-dark-darker sm:text-4xl">Latest Reviews</p>
                <div class="w-16 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($latestProducts as $product)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 flex flex-col group overflow-hidden">
                    <div class="relative pt-[100%] bg-white overflow-hidden border-b border-gray-50">
                        <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" class="absolute inset-0 w-full h-full object-contain p-4 transform transition-transform duration-500 group-hover:scale-105">
                        @if($product['discount_percentage'] > 0)
                        <div class="absolute top-3 left-3">
                            <span class="px-2 py-1 bg-red-500 text-white text-[10px] font-bold rounded">-{{ $product['discount_percentage'] }}%</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex items-center gap-1 mb-2">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="text-xs font-medium text-gray-600">{{ $product['star_rating'] }}</span>
                            <span class="text-xs text-gray-400">({{ $product['review_count'] }})</span>
                        </div>
                        <h3 class="text-sm font-bold text-dark-darker line-clamp-2 mb-2 flex-grow">{{ $product['name'] }}</h3>
                        <div class="mt-auto pt-3">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="text-lg font-extrabold text-brand">{{ $product['price'] }}</span>
                                @if($product['original_price'] && $product['original_price'] !== $product['price'])
                                <span class="text-sm text-gray-400 line-through">{{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            <a href="{{ route('product.detail', $product['slug']) }}" class="block w-full text-center px-4 py-2 border-2 border-brand text-brand font-semibold rounded-xl hover:bg-brand hover:text-white transition-colors text-sm">
                                View Review
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    @if($latestPosts->count() > 0)
    <section class="py-20 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">From The Blog</h2>
                <p class="mt-2 text-3xl font-extrabold text-dark-darker sm:text-4xl">Latest Articles</p>
                <div class="w-16 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                <a href="{{ route('blog.show', $post['slug']) }}" class="group bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300">
                    <div class="aspect-[16/9] overflow-hidden">
                        <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-xs font-semibold text-brand bg-brand/10 px-2.5 py-1 rounded-full">{{ $post['category'] ?? 'Review' }}</span>
                            <span class="text-xs text-gray-500">{{ $post['read_time'] ?? '5 min read' }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-dark-darker line-clamp-2 group-hover:text-brand transition-colors">{{ $post['title'] }}</h3>
                        <p class="text-sm text-gray-500 mt-2 line-clamp-2">{{ $post['excerpt'] }}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 border-2 border-gray-200 text-sm font-bold rounded-xl text-dark-darker hover:border-brand hover:text-brand transition-all">
                    View All Articles
                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Trust Us -->
    <section class="py-20 bg-dark-darker text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">Why Choose Us</h2>
                <p class="mt-2 text-3xl font-extrabold sm:text-4xl">Trusted Reviews Since 2024</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 rounded-2xl bg-white/5 border border-white/10">
                    <div class="w-14 h-14 bg-brand/20 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Honest & Unbiased</h3>
                    <p class="text-gray-400">Every product is reviewed based on real testing and research. We never publish paid positive reviews.</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-white/5 border border-white/10">
                    <div class="w-14 h-14 bg-brand/20 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Data-Driven</h3>
                    <p class="text-gray-400">We analyze specs, user feedback, and market data to help you make the smartest purchase decision.</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-white/5 border border-white/10">
                    <div class="w-14 h-14 bg-brand/20 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <svg class="w-7 h-7 text-brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Best Deals</h3>
                    <p class="text-gray-400">We track prices and highlight the best deals, discount codes, and value-for-money picks across all categories.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#0b1120] pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 overflow-hidden rounded-full ring-2 ring-brand/30 bg-white">
                            <img src="{{ asset(\App\Models\SiteSetting::getValue('logo', 'images/logo-optimized.jpg')) }}" alt="Logo" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <span class="block text-lg font-extrabold text-white">{{ \App\Models\SiteSetting::getValue('site_name', 'ReviewHub') }}</span>
                            <span class="block text-xs text-brand font-semibold tracking-widest uppercase">{{ \App\Models\SiteSetting::getValue('site_tagline', 'Honest Reviews') }}</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4 max-w-md">
                        {{ \App\Models\SiteSetting::getValue('site_description', 'We help you find the best products through honest, data-driven reviews and comparisons.') }}
                    </p>
                </div>

                <div class="md:col-span-3">
                    <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">Categories</h4>
                    <ul class="space-y-2">
                        @foreach($categories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}" class="text-gray-400 hover:text-brand text-sm transition-colors">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">Pages</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-brand text-sm transition-colors">Home</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-brand text-sm transition-colors">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-brand text-sm transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div class="md:col-span-2">
                    <h4 class="text-white font-bold mb-4 text-sm uppercase tracking-wider">Contact</h4>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li>{{ \App\Models\SiteSetting::getValue('contact_email', '') }}</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">{{ \App\Models\SiteSetting::getValue('footer_text', '© 2026 All rights reserved.') }}</p>
                <p class="text-gray-600 text-xs max-w-lg text-center md:text-right">{{ \App\Models\SiteSetting::getValue('footer_disclaimer', 'As an affiliate, we may earn commissions from qualifying purchases.') }}</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
