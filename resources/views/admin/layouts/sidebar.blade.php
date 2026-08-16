<!-- Desktop Sidebar -->
<aside class="fixed inset-y-0 left-0 z-50 bg-sidebar text-white transition-all duration-300 hidden lg:block"
    :class="sidebarOpen ? 'w-64' : 'w-20'">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2" x-show="sidebarOpen">
            <span class="text-xl font-extrabold text-brand">HW</span>
            <span class="text-sm font-semibold">Admin</span>
        </a>
        <a href="{{ route('admin.dashboard') }}" class="mx-auto" x-show="!sidebarOpen">
            <span class="text-xl font-extrabold text-brand">HW</span>
        </a>
    </div>

    <nav class="mt-6 px-3 space-y-1">
        @php
            $links = [
                ['route' => 'admin.dashboard', 'icon' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'admin.products.index', 'icon' => 'products', 'label' => 'Sản phẩm'],
                ['route' => 'admin.categories.index', 'icon' => 'categories', 'label' => 'Danh mục'],
                ['route' => 'admin.blog.index', 'icon' => 'blog', 'label' => 'Bài viết'],
                ['route' => 'admin.campaigns.index', 'icon' => 'campaigns', 'label' => 'Campaigns'],
                ['route' => 'admin.users.index', 'icon' => 'users', 'label' => 'Người dùng'],
                ['route' => 'admin.settings.index', 'icon' => 'settings', 'label' => 'Cài đặt'],
            ];
        @endphp

        @foreach($links as $link)
            @php
                $isActive = request()->routeIs($link['route'] . '*') || request()->routeIs(str_replace('.index', '.*', $link['route']));
            @endphp
            <a href="{{ route($link['route']) }}"
                class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                    {{ $isActive ? 'bg-brand text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                @include('admin.layouts.icons.' . $link['icon'])
                <span class="ml-3" x-show="sidebarOpen">{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>
</aside>

<!-- Mobile Sidebar -->
<aside x-show="mobileSidebar" x-transition:enter="transition ease-in-out duration-300 transform"
    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in-out duration-300 transform"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-sidebar text-white lg:hidden">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            <span class="text-xl font-extrabold text-brand">HW</span>
            <span class="text-sm font-semibold">Admin</span>
        </a>
        <button @click="mobileSidebar = false" class="text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="mt-6 px-3 space-y-1">
        @foreach($links as $link)
            @php
                $isActive = request()->routeIs($link['route'] . '*') || request()->routeIs(str_replace('.index', '.*', $link['route']));
            @endphp
            <a href="{{ route($link['route']) }}" @click="mobileSidebar = false"
                class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors
                    {{ $isActive ? 'bg-brand text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                @include('admin.layouts.icons.' . $link['icon'])
                <span class="ml-3">{{ $link['label'] }}</span>
            </a>
        @endforeach
    </nav>
</aside>
