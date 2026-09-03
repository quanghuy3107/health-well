<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ═══════════════════════════════════════════
         Dynamic SEO Meta Tags
    ════════════════════════════════════════════ -->
    <title>{{ $post['meta_title'] ?? $post['title'] . ' - FitWell Blog' }}</title>
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
    <meta property="og:site_name"   content="FitWell">

    <!-- Twitter Card -->
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $post['meta_title'] ?? $post['title'] }}">
    <meta name="twitter:description" content="{{ $post['meta_description'] ?? $post['excerpt'] }}">
    <meta name="twitter:image"       content="{{ $post['image'] }}">

    <!-- ═══════════════════════════════════════════
         JSON-LD BlogPosting Schema (if available)
    ════════════════════════════════════════════ -->
    @if(isset($post['schema']))
    <script type="application/ld+json">
    {!! json_encode($post['schema'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
    @endif


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
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* US-style Journalism Prose styling — excludes .not-prose blocks */
        .prose h2:not(.not-prose *) {
            font-size: 2rem;
            font-weight: 800;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            color: #111827;
            letter-spacing: -0.025em;
        }
        .prose h3:not(.not-prose *) {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        .prose p:not(.not-prose *) {
            margin-bottom: 1.5rem;
            font-size: 1.125rem;
            line-height: 1.8;
            color: #374151;
        }
        .prose ul:not(.not-prose *) {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .prose li:not(.not-prose *) {
            margin-bottom: 0.75rem;
            font-size: 1.125rem;
            color: #374151;
            line-height: 1.6;
        }
        .prose strong:not(.not-prose *) {
            font-weight: 700;
            color: #111827;
        }
        .prose a:not(.not-prose *) {
            color: #10b981;
            text-decoration: underline;
            text-underline-offset: 4px;
        }
        .prose a:not(.not-prose *):hover {
            color: #047857;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-dark selection:bg-brand selection:text-white">

    <!-- Header / Menu -->
    <header class="fixed w-full top-0 z-50 glass shadow-sm bg-white/95 backdrop-blur-xl" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-2.5 cursor-pointer group" aria-label="HomeWellness Home">
                    <div class="relative w-10 h-10 md:w-12 md:h-12 flex-shrink-0 overflow-hidden rounded-full shadow-md ring-2 ring-brand/20 group-hover:ring-brand/50 transition-all duration-300 bg-white">
                        <img src="{{ asset(\App\Models\SiteSetting::getValue('logo', 'images/logo-optimized.jpg')) }}" alt="HomeWellness logo" class="w-full h-full object-contain" fetchpriority="high" loading="eager" />
                    </div>
                    <div class="leading-none">
                        <span class="block text-base md:text-lg font-extrabold tracking-tight text-dark-darker group-hover:text-brand transition-colors duration-200">HomeWellness</span>
                        <span class="block text-[10px] md:text-xs text-brand font-semibold tracking-widest uppercase">Smart Home Vitality</span>
                    </div>
                </a>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8 lg:space-x-10">
                    <a href="{{ url('/') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Home</a>
                    <a href="{{ route('blog.index') }}" class="text-brand font-bold transition-colors duration-200">Blog</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Health</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Training</a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-dark hover:text-brand focus:outline-none p-2" aria-label="Toggle menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="md:hidden hidden pb-4">
                <nav class="flex flex-col gap-1">
                    <a href="{{ url('/') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Home</a>
                    <a href="{{ route('blog.index') }}" class="px-4 py-2.5 rounded-lg text-brand font-bold hover:bg-brand/5 transition-all duration-200">Blog</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Health</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Training</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="pt-28 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumbs -->
            <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/') }}" class="hover:text-brand transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <a href="{{ route('blog.index') }}" class="hover:text-brand transition-colors">Blog</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="text-gray-900 font-medium truncate max-w-[200px] sm:max-w-md">{{ $post['title'] }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Main Article Content -->
                <article class="w-full lg:w-2/3 bg-white p-6 sm:p-10 rounded-3xl shadow-sm border border-gray-100">
                    
                    <!-- Article Header -->
                    <header class="mb-10">
                        <span class="inline-block px-3 py-1 bg-brand/10 text-brand text-xs font-bold rounded-full uppercase tracking-wider mb-4">
                            {{ $post['category'] }}
                        </span>
                        
                        <h1 class="text-4xl sm:text-5xl font-black text-dark-darker tracking-tight leading-tight mb-6">
                            {{ $post['title'] }}
                        </h1>
                        
                        <!-- Meta info -->
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 font-medium border-y border-gray-100 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white font-bold">
                                    {{ substr($post['author'] ?? 'Editor', 0, 1) }}
                                </div>
                                <span class="text-dark-darker font-bold">{{ $post['author'] ?? 'FitWell Expert' }}</span>
                            </div>
                            <span class="hidden sm:inline-block w-1 h-1 rounded-full bg-gray-300"></span>
                            <span>{{ $post['date'] }}</span>
                            <span class="hidden sm:inline-block w-1 h-1 rounded-full bg-gray-300"></span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $post['read_time'] ?? '5 min read' }}
                            </span>
                        </div>
                    </header>

                    <!-- Featured Image -->
                    <figure class="mb-10">
                        <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-auto rounded-2xl object-cover">
                    </figure>

                    <!-- Article Body (Prose) -->
                    <div class="prose prose-lg max-w-none">
                        {!! $post['content'] !!}
                    </div>
                    
                </article>

                <!-- Sidebar (Desktop only) -->
                <aside class="w-full lg:w-1/3 space-y-8">
                    
                    <!-- Search Widget -->
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-dark-darker mb-4">Search</h3>
                        <div class="relative">
                            <input type="text" placeholder="Search articles..." class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-brand focus:ring-1 focus:ring-brand transition-colors">
                            <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                    </div>

                   

                    <!-- Related Articles Widget -->
                    @if(isset($relatedPosts) && $relatedPosts->count() > 0)
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100">
                        <h3 class="text-lg font-bold text-dark-darker mb-6">Related Articles</h3>
                        <div class="space-y-6">
                            @foreach($relatedPosts as $related)
                            <a href="{{ route('blog.show', $related['slug']) }}" class="flex gap-4 group">
                                <div class="w-20 h-20 flex-shrink-0 rounded-xl overflow-hidden">
                                    <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="text-sm font-bold text-dark-darker group-hover:text-brand transition-colors line-clamp-2 mb-1">
                                        {{ $related['title'] }}
                                    </h4>
                                    <span class="text-xs text-gray-500">{{ $related['date'] }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </aside>

            </div>
        </div>
    </main>

    <!-- SEO Footer -->
    <footer class="bg-[#0b1120] pt-20 pb-10 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
                        <li><a href="{{ url('/') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home</a></li>
                        <li><a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home Training Gear</a></li>
                        <li><a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Smart Health Tools</a></li>
                        <li><a href="{{ route('blog.index') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Blog</a></li>
                    </ul>
                </div>

                <!-- Links Col 2 -->
                <div class="md:col-span-4">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Top Searches</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Best home gym equipment 2026</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Clean whey protein for sensitive stomach</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-brand transition-colors text-base underline decoration-gray-700 underline-offset-4 hover:decoration-brand">Top-rated cordless vacuums for pet hair</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-gray-800/50 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-gray-500 text-sm">
                    &copy; 2026 FitWell - Home Fitness & Wellness. All rights reserved.
                </p>
                <p class="text-[11px] text-gray-700 text-center md:text-right max-w-2xl leading-relaxed">
                    Discovering the <strong>best home gym equipment 2026</strong> has never been easier. We provide highly curated <strong>clean whey protein for sensitive stomach</strong> issues, and review the <strong>top-rated cordless vacuums for pet hair</strong>.
                </p>
            </div>
        </div>
    </footer>
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
        }
    </script>
</body>
</html>

