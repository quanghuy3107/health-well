<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post['title'] }} | FitWell Blog</title>
    <meta name="description" content="{{ $post['excerpt'] }}">
    
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
    <style>
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .prose h2 {
            font-size: 1.875rem;
            font-weight: 800;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #111827;
        }
        .prose h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #1f2937;
        }
        .prose p {
            margin-bottom: 1.25rem;
            font-size: 1.125rem;
            line-height: 1.75;
            color: #4b5563;
        }
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin-bottom: 1.25rem;
        }
        .prose li {
            margin-bottom: 0.5rem;
            font-size: 1.125rem;
            color: #4b5563;
        }
        .prose strong {
            font-weight: 700;
            color: #111827;
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-dark selection:bg-brand selection:text-white">

    <!-- Header / Menu -->
    <header class="fixed w-full top-0 z-50 glass shadow-sm bg-white/95 backdrop-blur-xl" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex-shrink-0 flex items-center gap-3 cursor-pointer">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand to-brand-dark flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        FW
                    </div>
                    <span class="font-extrabold text-xl tracking-tight text-dark-darker">FitWell</span>
                </a>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-10">
                    <a href="{{ url('/') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Home</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Training</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Health</a>
                    <a href="{{ route('blog.index') }}" class="text-brand font-bold transition-colors duration-200">Blog</a>
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

    <!-- Blog Header / Hero -->
    <div class="relative pt-32 pb-16 lg:pt-40 lg:pb-24">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-block px-3 py-1 bg-brand/10 text-brand text-sm font-bold rounded-full uppercase tracking-wider mb-6">
                    {{ $post['category'] }}
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-dark-darker tracking-tight leading-tight mb-8">
                    {{ $post['title'] }}
                </h1>
                <div class="flex items-center justify-center gap-4 text-gray-500 font-medium">
                    <span>{{ $post['date'] }}</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                    <span>5 min read</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="aspect-w-16 aspect-h-9 w-full rounded-3xl overflow-hidden shadow-2xl">
            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="w-full h-[500px] object-cover">
        </div>
    </div>

    <!-- Blog Content -->
    <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="prose prose-lg prose-brand mx-auto">
            {!! $post['content'] !!}
        </div>
        
        <div class="mt-16 pt-8 border-t border-gray-200">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center font-bold text-dark hover:text-brand transition-colors">
                <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to all articles
            </a>
        </div>
    </article>

    <!-- SEO Footer -->
    <footer class="bg-[#0b1120] pt-20 pb-10 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Brand Col -->
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-brand flex items-center justify-center text-white font-bold text-xl">
                            FW
                        </div>
                        <span class="font-bold text-2xl tracking-tight text-white">FitWell</span>
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
</body>
</html>
