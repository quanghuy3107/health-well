<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') - HomeWellness</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#10B981',
                        'brand-dark': '#059669',
                        sidebar: '#1F2937',
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="bg-gray-100 min-h-screen" x-data="{ sidebarOpen: true, mobileSidebar: false }">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen" :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-20'">
            <!-- Top Navbar -->
            @include('admin.layouts.navbar')

            <!-- Page Content -->
            <main class="flex-1 p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg flex items-center justify-between" x-data="{ show: true }" x-show="show">
                        <span>{{ session('success') }}</span>
                        <button @click="show = false" class="text-green-500 hover:text-green-700">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg flex items-center justify-between" x-data="{ show: true }" x-show="show">
                        <span>{{ session('error') }}</span>
                        <button @click="show = false" class="text-red-500 hover:text-red-700">&times;</button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div x-show="mobileSidebar" @click="mobileSidebar = false"
        class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:leave="transition-opacity ease-linear duration-300"></div>

    @stack('scripts')
</body>
</html>
