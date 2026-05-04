<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Fitness & Wellness 2026</title>
    
    <!-- Fonts -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (via CDN for standalone blade file, you can compile via Vite later) -->
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
                            light: '#a7f3d0', // Emerald 200 - Nhẹ nhàng, tươi mát
                            DEFAULT: '#10b981', // Emerald 500 - Xanh lá chủ đạo
                            dark: '#047857', // Emerald 700 - Nhấn nhá
                        },
                        dark: {
                            DEFAULT: '#1f2937', // Gray 800 - Xám đen cho text
                            darker: '#111827', // Gray 900 - Đen sâu cho background
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
    <header class="fixed w-full top-0 z-50 glass transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <!-- Logo -->
                <a href="#home" class="flex-shrink-0 flex items-center gap-2.5 cursor-pointer group" aria-label="HomeWellness Home">
                    <div class="relative w-10 h-10 md:w-12 md:h-12 flex-shrink-0 overflow-hidden rounded-full shadow-md ring-2 ring-brand/20 group-hover:ring-brand/50 transition-all duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="HomeWellness logo" class="absolute w-[320%] max-w-none" style="top: -18%; left: -110%;" />
                    </div>
                    <div class="leading-none">
                        <span class="block text-base md:text-lg font-extrabold tracking-tight text-dark-darker group-hover:text-brand transition-colors duration-200">HomeWellness</span>
                        <span class="block text-[10px] md:text-xs text-brand font-semibold tracking-widest uppercase">Smart Home Vitality</span>
                    </div>
                </a>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8 lg:space-x-10">
                    <a href="#home" class="text-dark font-medium hover:text-brand transition-colors duration-200">Home</a>
                    <a href="{{ route('blog.index') }}" class="text-dark font-medium hover:text-brand transition-colors duration-200">Blog</a>
                    <a href="#health" class="text-dark font-medium hover:text-brand transition-colors duration-200">Health</a>
                    <a href="#training" class="text-dark font-medium hover:text-brand transition-colors duration-200">Training</a>
                    <a href="#about" class="text-dark font-medium hover:text-brand transition-colors duration-200">About Us</a>
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
                    <a href="#home" class="mobile-nav-link px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Home</a>
                    <a href="{{ route('blog.index') }}" class="mobile-nav-link px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Blog</a>
                    <a href="#health" class="mobile-nav-link px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Health</a>
                    <a href="#training" class="mobile-nav-link px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">Training</a>
                    <a href="#about" class="mobile-nav-link px-4 py-2.5 rounded-lg text-dark font-medium hover:text-brand hover:bg-brand/5 transition-all duration-200">About Us</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden flex items-center min-h-[90vh]">
        <!-- Background Image with Gradient Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/home-fitness-setup.jpg') }}" alt="Home Fitness Setup" class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-gradient-to-r from-dark-darker/95 via-dark-darker/80 to-brand/30"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center lg:text-left">
            <div class="inline-block px-4 py-1 rounded-full bg-brand/20 border border-brand/30 mb-6 backdrop-blur-sm">
                <span class="text-brand-light font-semibold tracking-wider uppercase text-sm animate-pulse">Welcome to modern living</span>
            </div>
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6 drop-shadow-lg">
                Your Journey to a <br class="hidden lg:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-light to-brand">Healthier Home</span> Starts Here
            </h1>
            <p class="mt-4 max-w-2xl mx-auto lg:mx-0 text-xl text-gray-300 mb-10 leading-relaxed font-light">
                Discover the perfect synergy of premium home workout gear and smart living space purifiers. Designed specifically for your modern lifestyle.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="#training" class="inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-white bg-brand hover:bg-brand-dark transition-all duration-300 transform hover:-translate-y-1 hover:shadow-brand/50">
                    Explore Training Gear
                </a>
                <a href="#health" class="inline-flex justify-center items-center px-8 py-4 border-2 border-white/80 text-base font-semibold rounded-full shadow-sm text-white hover:bg-white hover:text-dark-darker transition-all duration-300 transform hover:-translate-y-1 glass">
                    Discover Smart Health
                </a>
            </div>
        </div>
    </section>

    <!-- Category 1 - Home Training -->
    <section id="training" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">Performance</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark-darker sm:text-4xl">
                    Home Training Essentials
                </p>
                <div class="w-16 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Image side -->
                <div class="relative group rounded-3xl overflow-hidden shadow-2xl">
                    <img src="{{ asset('images/workout-equipment.jpg') }}" alt="Workout Equipment" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105" />
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-darker/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <span class="px-4 py-1.5 bg-brand text-white text-xs font-bold rounded-full uppercase tracking-wider shadow-lg">Top Rated 2026</span>
                    </div>
                </div>

                <!-- Content side -->
                <div class="space-y-12">
                    <!-- Feature 1 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-14 w-14 rounded-2xl bg-brand/10 text-brand shadow-sm border border-brand/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-dark-darker">Whey Protein Isolate</h3>
                            <p class="mt-3 text-lg text-gray-500 leading-relaxed">
                                Dòng whey siêu sạch, tinh khiết 100%. Đặc biệt thân thiện với hệ tiêu hóa, <strong>không gây đau bụng hay đầy hơi</strong>. Nhiên liệu phục hồi cơ bắp hoàn hảo sau mỗi buổi tập tại nhà.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-14 w-14 rounded-2xl bg-brand/10 text-brand shadow-sm border border-brand/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-dark-darker">Smart Home Gear</h3>
                            <p class="mt-3 text-lg text-gray-500 leading-relaxed">
                                Tối ưu không gian sống với <strong>Adjustable Dumbbells</strong> (tạ tháo lắp thông minh) và <strong>Yoga Mats</strong> chống trượt cao cấp. Biến bất kỳ góc nhỏ nào thành phòng gym chuyên nghiệp.
                            </p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ url('/training/best-whey-protein-home-gear') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-bold rounded-xl shadow-lg text-white bg-dark-darker hover:bg-dark transition-all duration-300 transform hover:-translate-y-1">
                            Shop Best Training Gear
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category 2 - Smart Health -->
    <section id="health" class="py-24 bg-gray-50 relative border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-sm text-brand font-bold tracking-widest uppercase">Wellness & Environment</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark-darker sm:text-4xl">
                    Smart Health Solutions
                </p>
                <div class="w-16 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center flex-col-reverse lg:flex-row-reverse">
                
                <!-- Content side -->
                <div class="space-y-12 order-2 lg:order-1">
                    <!-- Feature 1 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-14 w-14 rounded-2xl bg-brand/10 text-brand shadow-sm border border-brand/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-dark-darker">Cordless Vacuum Cleaners</h3>
                            <p class="mt-3 text-lg text-gray-500 leading-relaxed">
                                Máy hút bụi không dây thế hệ mới. Lực hút siêu cường, thiết kế gọn nhẹ, chuyên trị lông thú cưng và bụi mịn, giữ cho không gian sống của bạn luôn trong trạng thái tinh khiết nhất.
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-14 w-14 rounded-2xl bg-brand/10 text-brand shadow-sm border border-brand/20">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h3 class="text-2xl font-bold text-dark-darker">HEPA Air Purifiers</h3>
                            <p class="mt-3 text-lg text-gray-500 leading-relaxed">
                                Hít thở không khí trong lành ngay cả khi đang tập luyện căng thẳng. Hệ thống lọc thông minh loại bỏ 99.97% tác nhân gây dị ứng và mùi hôi trong không gian kín.
                            </p>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ url('/health/smart-home-wellness-tools') }}" class="inline-flex items-center px-8 py-4 border border-transparent text-base font-bold rounded-xl shadow-lg text-white bg-brand hover:bg-brand-dark transition-all duration-300 transform hover:-translate-y-1">
                            Explore Wellness Tools
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Image side -->
                <div class="relative group rounded-3xl overflow-hidden shadow-2xl order-1 lg:order-2">
                    <img src="{{ asset('images/cordless-vacuums-clean-home.jpg') }}" alt="Clean Home Environment" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105" />
                    <!-- Subtile overlay -->
                    <div class="absolute inset-0 bg-brand/5 mix-blend-overlay"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-dark-darker text-white relative overflow-hidden">
        <!-- Abstract shape backgrounds -->
        <div class="absolute top-0 right-0 -mr-32 -mt-32 w-96 h-96 rounded-full bg-brand/10 blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-32 -mb-32 w-96 h-96 rounded-full bg-brand-light/5 blur-3xl pointer-events-none"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-sm text-brand font-bold tracking-widest uppercase mb-4">Our Story</h2>
            <h3 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-10">About Us</h3>
            
            <div class="bg-white/5 backdrop-blur-md rounded-3xl p-10 md:p-14 border border-white/10 shadow-2xl relative">
                <!-- Quote icon -->
                <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-brand rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>
                
                <p class="text-xl md:text-2xl text-gray-300 leading-relaxed font-light italic">
                    "Chúng tôi tin rằng một cơ thể khỏe mạnh bắt nguồn từ một không gian sống sạch sẽ và những thói quen tốt tại nhà. Sứ mệnh của chúng tôi là mang đến cho bạn những giải pháp tối ưu nhất, từ các thiết bị tập luyện nhỏ gọn, hiệu quả cho đến những sản phẩm dinh dưỡng an toàn tuyệt đối và thiết bị làm sạch không gian thông minh. Hãy cùng chúng tôi xây dựng một lối sống khỏe mạnh toàn diện ngay tại chính ngôi nhà của bạn."
                </p>
                <div class="mt-10 flex items-center justify-center gap-4">
                    <div class="w-16 h-1 bg-gradient-to-r from-transparent to-brand rounded-full"></div>
                    <span class="text-brand font-bold uppercase tracking-widest text-sm">FitWell 2026 Team</span>
                    <div class="w-16 h-1 bg-gradient-to-l from-transparent to-brand rounded-full"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Footer -->
    <footer class="bg-[#0b1120] pt-20 pb-10 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Brand Col -->
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="relative w-12 h-12 flex-shrink-0 overflow-hidden rounded-full ring-2 ring-brand/30">
                            <img src="{{ asset('images/logo.png') }}" alt="HomeWellness logo" class="absolute w-[320%] max-w-none" style="top: -18%; left: -110%;" />
                        </div>
                        <div class="leading-none">
                            <span class="block text-lg font-extrabold tracking-tight text-white">HomeWellness</span>
                            <span class="block text-xs text-brand font-semibold tracking-widest uppercase mt-0.5">Smart Home Vitality</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-base leading-relaxed mb-6 pr-4">
                        Tái tạo không gian sống, nâng tầm sức khỏe. Giải pháp toàn diện cho việc tập luyện và thanh lọc môi trường sống tại nhà của bạn.
                    </p>
                </div>
                
                <!-- Links Col 1 -->
                <div class="md:col-span-3">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="#home" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home</a></li>
                        <li><a href="#training" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Home Training Gear</a></li>
                        <li><a href="#health" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> Smart Health Tools</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-brand transition-colors text-base flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-brand"></span> About Us</a></li>
                    </ul>
                </div>

                <!-- Links Col 2 (SEO Keywords wrapped nicely) -->
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
                header.classList.replace('glass', 'bg-white/95');
                header.classList.add('backdrop-blur-xl');
            } else {
                header.classList.remove('shadow-md');
                header.classList.replace('bg-white/95', 'glass');
                header.classList.remove('backdrop-blur-xl');
            }
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => mobileMenu.classList.toggle('hidden'));
            mobileMenu.querySelectorAll('a').forEach(link => link.addEventListener('click', () => mobileMenu.classList.add('hidden')));
        }

        // Smooth Scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>
