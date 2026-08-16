<header class="sticky top-0 z-30 bg-white border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between h-16 px-4 sm:px-6">
        <div class="flex items-center space-x-3">
            <!-- Mobile menu toggle -->
            <button @click="mobileSidebar = !mobileSidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Desktop sidebar toggle -->
            <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:block text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h1>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Visit Site -->
            <a href="{{ url('/') }}" target="_blank" class="text-sm text-gray-500 hover:text-brand flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Xem trang
            </a>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 text-sm text-gray-700 hover:text-brand">
                    <div class="w-8 h-8 rounded-full bg-brand/10 flex items-center justify-center">
                        <span class="text-brand font-bold text-xs">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                    </div>
                    <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-1 z-50">
                    <div class="px-4 py-2 border-b border-gray-100">
                        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                            Đăng xuất
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
