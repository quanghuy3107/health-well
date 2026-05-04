<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $product['name'] }} Review &amp; Best Price 2026 - FitWell</title>
    <meta name="description" content="{{ $product['name'] }} — {{ $product['description'] }} Check the best price, real user reviews, and detailed specifications. Save {{ $product['discount_percentage'] }}% today.">

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
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: { light: '#a7f3d0', DEFAULT: '#10b981', dark: '#047857' },
                        dark: { DEFAULT: '#1f2937', darker: '#111827' }
                    }
                }
            }
        }
    </script>

    <!-- JSON-LD Product Schema for Rich Snippets -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org/",
        "@@type": "Product",
        "name": "{{ $product['name'] }}",
        "image": @json($product['gallery_images']),
        "description": "{{ $product['description'] }}",
        "brand": {
            "@@type": "Brand",
            "name": "{{ $product['specifications']['Brand'] ?? 'FitWell' }}"
        },
        "offers": {
            "@@type": "Offer",
            "url": "{{ url('/product/' . $product['slug']) }}",
            "priceCurrency": "USD",
            "price": "{{ $product['price_numeric'] }}",
            "availability": "https://schema.org/InStock",
            "priceValidUntil": "{{ date('Y-12-31') }}"
        },
        "aggregateRating": {
            "@@type": "AggregateRating",
            "ratingValue": "{{ $product['star_rating'] }}",
            "reviewCount": "{{ $product['review_count'] }}",
            "bestRating": "5",
            "worstRating": "1"
        }
    }
    </script>

    <!-- BreadcrumbList Schema -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "BreadcrumbList",
        "itemListElement": [
            { "@@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
            { "@@type": "ListItem", "position": 2, "name": "{{ $product['category_label'] }}", "item": "{{ $product['category'] === 'training' ? url('/training/best-whey-protein-home-gear') : url('/health/smart-home-wellness-tools') }}" },
            { "@@type": "ListItem", "position": 3, "name": "{{ $product['name'] }}" }
        ]
    }
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 text-dark selection:bg-brand selection:text-white">

    <!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-sm transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand to-brand-dark flex items-center justify-center text-white font-bold text-xl shadow-lg">FW</div>
                    <span class="font-extrabold text-xl tracking-tight text-dark-darker">FitWell</span>
                </a>
                <nav class="hidden md:flex space-x-10">
                    <a href="{{ url('/') }}" class="text-dark font-medium  hover:text-brand transition-colors">Home</a>
                    <a href="{{ route('blog.index') }}" class="text-dark font-medium  hover:text-brand transition-colors">Blog</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-dark font-medium hover:text-brand transition-colors">Training</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-dark font-medium hover:text-brand transition-colors">Health</a>
                    <a href="{{ url('/#about') }}" class="text-dark font-medium hover:text-brand transition-colors">About Us</a>
                </nav>
                <div class="md:hidden">
                    <button class="text-dark hover:text-brand focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-24 lg:pt-28 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-sm text-gray-500">
                    <li><a href="{{ url('/') }}" class="hover:text-brand transition-colors">Home</a></li>
                    <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                    <li><a href="{{ $product['category'] === 'training' ? url('/training/best-whey-protein-home-gear') : url('/health/smart-home-wellness-tools') }}" class="hover:text-brand transition-colors">{{ $product['category_label'] }}</a></li>
                    <li><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></li>
                    <li class="text-dark font-medium truncate max-w-[200px] sm:max-w-none">{{ $product['name'] }}</li>
                </ol>
            </nav>

            <!-- Product Top Section: Gallery + Info -->
            <div class="lg:grid lg:grid-cols-12 lg:gap-12">

                <!-- Left Column: Gallery -->
                <div class="lg:col-span-5 mb-10 lg:mb-0">
                    <!-- Main Image -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden mb-4">
                        <img id="mainImage" src="{{ $product['gallery_images'][0] }}" alt="{{ $product['name'] }}" class="w-full h-[350px] md:h-[450px] object-contain p-6">
                    </div>
                    <!-- Thumbnails -->
                    <div class="grid grid-cols-4 gap-3">
                        @foreach($product['gallery_images'] as $index => $img)
                            <button onclick="document.getElementById('mainImage').src='{{ $img }}'; document.querySelectorAll('.thumb-btn').forEach(b=>b.classList.remove('ring-2','ring-brand')); this.classList.add('ring-2','ring-brand')" class="thumb-btn bg-white rounded-xl border border-gray-100 overflow-hidden hover:shadow-md transition-all {{ $index === 0 ? 'ring-2 ring-brand' : '' }}">
                                <img src="{{ $img }}" alt="{{ $product['name'] }} - Image {{ $index + 1 }}" class="w-full h-20 object-contain p-2">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Right Column: Product Info (Sticky Sidebar) -->
                <div class="lg:col-span-7">
                    <div class="lg:sticky lg:top-28">

                        <!-- Product Title -->
                        <h1 class="text-2xl md:text-3xl font-extrabold text-dark-darker leading-tight mb-3">
                            {{ $product['name'] }}
                        </h1>

                        <!-- Rating -->
                        <div class="flex items-center gap-2 mb-4">
                            <div class="flex items-center" aria-label="{{ $product['star_rating'] }} out of 5 stars">
                                @php $productIndex = 0; @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product['star_rating']))
                                        <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @elseif($i - $product['star_rating'] < 1 && $i - $product['star_rating'] > 0)
                                        <svg class="w-5 h-5 text-amber-400" viewBox="0 0 20 20">
                                            <defs><linearGradient id="detail-half-{{ $productIndex }}-{{ $i }}"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="#D1D5DB"/></linearGradient></defs>
                                            <path fill="url(#detail-half-{{ $productIndex }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endif
                                @endfor
                            </div>
                            <span class="text-sm font-semibold text-dark">{{ $product['star_rating'] }}</span>
                            <a href="#reviews" class="text-sm text-blue-600 hover:underline">({{ number_format($product['review_count']) }} reviews)</a>
                        </div>

                        <!-- Price Block -->
                        <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-6 shadow-sm">
                            <div class="flex items-baseline gap-3 mb-2">
                                <span class="text-4xl font-extrabold text-dark-darker">{{ $product['price'] }}</span>
                                <span class="text-lg text-gray-400 line-through">{{ $product['original_price'] }}</span>
                            </div>
                            <div class="flex items-center gap-2 mb-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-red-100 text-red-700 text-sm font-bold">Save {{ $product['discount_percentage'] }}%</span>
                                <span class="text-sm text-gray-500">Limited time deal</span>
                            </div>
                            <div class="flex items-center gap-1.5 mb-5">
                                <svg class="w-4 h-4 text-brand" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span class="text-sm font-medium text-brand">In Stock &mdash; Fast Shipping to US</span>
                            </div>
                            <!-- CTA Button -->
                            <a href="{{ $product['affiliate_link'] }}" target="_blank" rel="nofollow noopener" class="w-full inline-flex justify-center items-center px-8 py-4 text-lg font-bold rounded-xl text-white bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 shadow-lg hover:shadow-xl hover:shadow-orange-500/25 transition-all duration-300 transform hover:-translate-y-0.5 active:scale-[0.98]">
                                Check Price on Official Store
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>

                        <!-- Key Features -->
                        <div class="mb-6">
                            <h2 class="text-lg font-bold text-dark-darker mb-3">Key Features</h2>
                            <ul class="space-y-2.5">
                                @foreach($product['key_features'] as $feature)
                                    <li class="flex items-start gap-2.5 text-gray-600">
                                        <svg class="w-5 h-5 text-brand flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Why Choose Us -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="text-center p-3 bg-white rounded-xl border border-gray-100">
                                <svg class="w-6 h-6 text-brand mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-xs font-semibold text-gray-600">Free Shipping</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-xl border border-gray-100">
                                <svg class="w-6 h-6 text-brand mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <span class="text-xs font-semibold text-gray-600">Secure Checkout</span>
                            </div>
                            <div class="text-center p-3 bg-white rounded-xl border border-gray-100">
                                <svg class="w-6 h-6 text-brand mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                <span class="text-xs font-semibold text-gray-600">Easy Returns</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Bottom Section: Description, Specs, Frequently Bought Together -->
            <div class="mt-16 lg:grid lg:grid-cols-12 lg:gap-12">

                <!-- Left: Description + Specs -->
                <div class="lg:col-span-8">

                    <!-- Tabs -->
                    <div class="border-b border-gray-200 mb-8">
                        <div class="flex gap-8">
                            <button onclick="showTab('description')" id="tab-description" class="tab-btn pb-3 text-base font-bold text-brand border-b-2 border-brand transition-colors">Description</button>
                            <button onclick="showTab('specifications')" id="tab-specifications" class="tab-btn pb-3 text-base font-bold text-gray-400 border-b-2 border-transparent hover:text-gray-600 transition-colors">Specifications</button>
                        </div>
                    </div>

                    <!-- Description Tab -->
                    <div id="content-description" class="tab-content">
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            <p>{{ $product['long_description'] }}</p>
                        </div>
                    </div>

                    <!-- Specifications Tab -->
                    <div id="content-specifications" class="tab-content hidden">
                        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm">
                            <table class="w-full">
                                <tbody>
                                    @foreach($product['specifications'] as $label => $value)
                                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                            <td class="px-6 py-4 text-sm font-semibold text-dark-darker w-1/3">{{ $label }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right: Frequently Bought Together (Sticky) -->
                <div class="lg:col-span-4 mt-10 lg:mt-0">
                    <div class="lg:sticky lg:top-28">
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                            <h3 class="text-lg font-bold text-dark-darker mb-5">Frequently Bought Together</h3>
                            <div class="space-y-4">
                                @foreach($product['frequently_bought_together'] as $related)
                                    <a href="{{ $related['affiliate_link'] }}" target="_blank" rel="nofollow noopener" class="flex items-center gap-4 p-3 rounded-xl hover:bg-gray-50 transition-colors group">
                                        <div class="w-16 h-16 flex-shrink-0 bg-gray-50 rounded-lg overflow-hidden">
                                            <img src="{{ $related['image'] }}" alt="{{ $related['name'] }}" class="w-full h-full object-contain p-1">
                                        </div>
                                        <div class="flex-grow min-w-0">
                                            <p class="text-sm font-semibold text-dark-darker truncate group-hover:text-brand transition-colors">{{ $related['name'] }}</p>
                                            <p class="text-sm font-bold text-brand mt-1">{{ $related['price'] }}</p>
                                        </div>
                                        <svg class="w-4 h-4 text-gray-300 group-hover:text-brand flex-shrink-0 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                @endforeach
                            </div>

                            <!-- Secondary CTA -->
                            <div class="mt-5 pt-5 border-t border-gray-100">
                                <a href="{{ $product['affiliate_link'] }}" target="_blank" rel="nofollow noopener" class="w-full inline-flex justify-center items-center px-6 py-3 text-sm font-bold rounded-xl text-white bg-dark-darker hover:bg-brand transition-all duration-300">
                                    Check Price on Store
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#0b1120] pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-xl bg-brand flex items-center justify-center text-white font-bold text-xl">FW</div>
                        <span class="font-bold text-2xl tracking-tight text-white">FitWell</span>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed pr-4">
                        Reinvent your living space, elevate your health. A comprehensive solution for home workouts and purifying your living environment.
                    </p>
                </div>
                <div class="md:col-span-3">
                    <h4 class="text-white font-bold mb-5 uppercase tracking-wider text-sm">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home</a></li>
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Training Gear</a></li>
                        <li><a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Health Tools</a></li>
                        <li><a href="{{ url('/#about') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> About Us</a></li>
                    </ul>
                </div>
                <div class="md:col-span-4">
                    <h4 class="text-white font-bold mb-5 uppercase tracking-wider text-sm">Top Searches</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Best home gym equipment 2026</a></li>
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Clean whey protein for sensitive stomach</a></li>
                        <li><a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Top-rated cordless vacuums for pet hair</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-6 border-t border-gray-800/50 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} FitWell - Home Fitness & Wellness. All rights reserved.</p>
                <p class="text-[11px] text-gray-700 text-center md:text-right max-w-2xl leading-relaxed">
                    Discovering the <strong>best home gym equipment 2026</strong> has never been easier. We provide highly curated <strong>clean whey protein for sensitive stomach</strong> issues, and review the <strong>top-rated cordless vacuums for pet hair</strong>.
                </p>
            </div>
        </div>
    </footer>

    <!-- Tab Switching Script -->
    <script>
        function showTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('text-brand', 'border-brand');
                btn.classList.add('text-gray-400', 'border-transparent');
            });
            document.getElementById('content-' + tab).classList.remove('hidden');
            const activeBtn = document.getElementById('tab-' + tab);
            activeBtn.classList.remove('text-gray-400', 'border-transparent');
            activeBtn.classList.add('text-brand', 'border-brand');
        }
    </script>
</body>
</html>
