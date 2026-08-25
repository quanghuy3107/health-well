<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | HomeWellness - Expert Health Support</title>
    <meta name="description" content="Have questions about our health products or your wellness journey? Contact our experts today. We prioritize your privacy and respond within 24 hours.">
    
    <!-- Fonts -->
    <link rel="icon" type="image/jpeg" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
    <link rel="apple-touch-icon" href="{{ asset(\App\Models\SiteSetting::getValue('favicon', 'favicon.jpg')) }}?v=3">
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
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 text-dark selection:bg-brand selection:text-white">

    <!-- Header / Menu -->
    <header class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-xl shadow-sm transition-all duration-300" id="navbar">
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
                    <a href="{{ route('blog.index') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Blog</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Health</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Training</a>
                    <a href="{{ route('contact') }}" class="text-brand font-bold transition-colors duration-200">Contact Us</a>
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
                    <a href="{{ route('blog.index') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Blog</a>
                    <a href="{{ url('/health/smart-home-wellness-tools') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Health</a>
                    <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Training</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2.5 rounded-lg text-brand font-bold hover:bg-brand/5 transition-all duration-200">Contact Us</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="pt-32 pb-20 lg:pt-48">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold text-dark-darker tracking-tight mb-4">
                    Contact Us
                </h1>
                <div class="w-16 h-1 bg-brand mx-auto mb-8 rounded-full"></div>
                <p class="text-lg text-gray-600 leading-relaxed font-light">
                    We prioritize your privacy. Send us a message through this form, and our health and wellness experts will respond within 24 hours.
                </p>
            </div>

            <!-- Contact Form Section -->
            <div class="max-w-2xl mx-auto">
                @if(session('success'))
                <div class="mb-8 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl shadow-sm flex items-center gap-3 animate-pulse">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('success') }}</span>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-8 p-4 bg-red-100 border border-red-200 text-red-700 rounded-xl shadow-sm flex items-center gap-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-bold">{{ session('error') }}</span>
                </div>
                @endif

                @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 border border-red-100 text-red-600 rounded-xl shadow-sm">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="bg-white rounded-3xl shadow-xl border border-brand/10 overflow-hidden">
                    <div class="bg-brand p-1 text-center"></div>
                    <form action="{{ route('contact.submit') }}" method="POST" class="p-8 md:p-12 space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-dark-darker mb-2">Name</label>
                                <input type="text" id="name" name="name" required 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand/20 focus:border-brand outline-none transition-all"
                                    placeholder="Your full name" value="{{ old('name') }}">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-dark-darker mb-2">Email</label>
                                <input type="email" id="email" name="email" required 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand/20 focus:border-brand outline-none transition-all"
                                    placeholder="Your email address" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-bold text-dark-darker mb-2">Subject</label>
                            <select id="subject" name="subject" required 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand/20 focus:border-brand outline-none transition-all bg-white appearance-none">
                                <option value="" disabled {{ old('subject') ? '' : 'selected' }}>How can we help you?</option>
                                <option value="wellness" {{ old('subject') == 'wellness' ? 'selected' : '' }}>Personal Wellness & Health Consultation</option>
                                <option value="product" {{ old('subject') == 'product' ? 'selected' : '' }}>Home Gym Equipment & Product Inquiry</option>
                                <option value="order" {{ old('subject') == 'order' ? 'selected' : '' }}>Order Support & Shipping Assistance</option>
                                <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Business Partnership & Collaboration</option>
                                <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>General Inquiry</option>
                            </select>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-bold text-dark-darker mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" required 
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand/20 focus:border-brand outline-none transition-all resize-none"
                                placeholder="How can we help you?">{{ old('message') }}</textarea>
                        </div>
                        <div>
                            <button type="submit" 
                                class="w-full bg-brand hover:bg-brand-dark text-white font-bold py-4 px-8 rounded-xl shadow-lg shadow-brand/20 transition-all duration-300 transform hover:-translate-y-1">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="mt-20 text-center">
                <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-8">Follow Our Wellness Journey</p>
                <div class="flex justify-center gap-6">
                    <a href="https://tiktok.com/@homewellness" target="_blank" class="flex items-center gap-3 px-6 py-3 bg-white rounded-full border border-gray-100 shadow-sm hover:shadow-md hover:border-brand/30 transition-all group">
                        <svg class="w-6 h-6 text-dark group-hover:text-brand transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.032 2.612.351 3.758 1.105.15.11.237.284.237.47v3.085c0 .178-.08.347-.215.457-.273.224-.62.332-.964.332-.14 0-.282-.016-.421-.05a5.29 5.29 0 0 1-2.903-2.148c-.097-.13-.251-.204-.413-.204H9.424c-.206 0-.374.168-.374.374V17.5c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4c.483 0 .942.086 1.365.242.164.06.347-.008.43-.162l1.246-2.316a.375.375 0 0 0-.16-.49 6.46 6.46 0 0 0-2.881-.674C2.463 10.1 0 12.563 0 15.563S2.463 21.026 5.463 21.026s5.463-2.463 5.463-5.463V6.262c1.077.785 2.383 1.22 3.738 1.238.206.002.374-.165.374-.371V4.286c0-.206-.168-.374-.374-.374-1.39-.015-2.732-.505-3.804-1.383-.153-.125-.241-.314-.241-.513V.394C10.619.176 10.796 0 11.014 0c.504 0 1.008.007 1.511.02z"/>
                        </svg>
                        <span class="font-bold text-dark-darker">TikTok</span>
                    </a>
                    <a href="https://instagram.com/homewellness" target="_blank" class="flex items-center gap-3 px-6 py-3 bg-white rounded-full border border-gray-100 shadow-sm hover:shadow-md hover:border-brand/30 transition-all group">
                        <svg class="w-6 h-6 text-dark group-hover:text-brand transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span class="font-bold text-dark-darker">Instagram</span>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
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
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Contact Us</a></li>
                    </ul>
                </div>

                <!-- Links Col 2 -->
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
                    &copy; 2026 HomeWellness - Home Fitness & Wellness. All rights reserved.
                </p>
                <p class="text-[11px] text-gray-700 text-center md:text-right max-w-2xl leading-relaxed">
                    Discovering the <strong>best home gym equipment 2026</strong> has never been easier. We provide highly curated <strong>clean whey protein for sensitive stomach</strong> issues, and review the <strong>top-rated cordless vacuums for pet hair</strong>.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Sticky Header
        window.addEventListener('scroll', () => {
            const header = document.getElementById('navbar');
            if (window.scrollY > 20) {
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('shadow-md');
            }
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>

