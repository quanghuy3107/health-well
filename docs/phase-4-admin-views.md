# Phase 4: Admin Panel Views (Giao diện quản trị)

## Tổng quan
Giao diện admin sử dụng Tailwind CSS (CDN) + Alpine.js cho tương tác. Responsive, sidebar collapsible, mobile-friendly.

## Tech Stack UI

| Công nghệ | Mục đích | Loading |
|-----------|----------|---------|
| Tailwind CSS | Styling | CDN (`cdn.tailwindcss.com`) |
| Alpine.js | Interactivity (dropdowns, sidebar toggle) | CDN |
| Blade Templates | Rendering | Server-side |

## Cấu trúc Views

```
resources/views/admin/
├── layouts/
│   ├── app.blade.php           ← Layout chính (head, body, sidebar + content)
│   ├── navbar.blade.php        ← Top navigation bar
│   ├── sidebar.blade.php       ← Sidebar navigation (desktop + mobile)
│   └── icons/                  ← SVG icons cho sidebar
│       ├── dashboard.blade.php
│       ├── products.blade.php
│       ├── categories.blade.php
│       ├── blog.blade.php
│       ├── campaigns.blade.php
│       ├── users.blade.php
│       └── settings.blade.php
├── dashboard.blade.php         ← Trang tổng quan
├── products/
│   ├── index.blade.php         ← Danh sách (table + pagination)
│   ├── create.blade.php        ← Form tạo mới
│   ├── edit.blade.php          ← Form chỉnh sửa
│   └── _form.blade.php         ← Partial form (dùng chung create/edit)
├── categories/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── _form.blade.php
├── blog/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── _form.blade.php
├── campaigns/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── _form.blade.php
├── users/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── _form.blade.php
└── settings/
    └── index.blade.php         ← Form cập nhật settings (grouped)
```

## Layout System

### `admin.layouts.app`
Layout chính chứa:
- `<head>` với Tailwind CDN + Alpine.js
- Sidebar + Main content area
- Flash message (success/error)
- Mobile overlay

### Sections có thể override
```blade
@section('title', 'Page Title')         ← Browser tab title
@section('page-title', 'Page Heading')  ← Navbar heading
@section('content')                      ← Main content
@stack('styles')                         ← Extra CSS
@stack('scripts')                        ← Extra JS
```

### Alpine.js State (layout level)
```js
x-data="{ sidebarOpen: true, mobileSidebar: false }"
```

## Quy chuẩn khi phát triển

### Tạo view mới cho module admin

1. Tạo folder `resources/views/admin/<module>/`
2. Tạo 4 files: `index.blade.php`, `create.blade.php`, `edit.blade.php`, `_form.blade.php`
3. Mỗi file extends `admin.layouts.app`
4. Thêm icon mới vào `resources/views/admin/layouts/icons/<module>.blade.php`
5. Thêm link vào sidebar array trong `sidebar.blade.php`

### Template index.blade.php (danh sách)
```blade
@extends('admin.layouts.app')

@section('title', 'Quản lý xxx')
@section('page-title', 'Xxx')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <!-- Header + Create button -->
    <div class="p-6 border-b border-gray-200 flex ...">
        <h2>...</h2>
        <a href="...">Thêm mới</a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table>...</table>
    </div>

    <!-- Pagination -->
    @if($items->hasPages())
    <div class="p-6 border-t">{{ $items->links() }}</div>
    @endif
</div>
@endsection
```

### Template _form.blade.php (partial)
```blade
@php $item = $item ?? null; @endphp

<!-- Errors -->
@if($errors->any()) ... @endif

<!-- Form sections in white cards -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold mb-4">Section Title</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Inputs -->
    </div>
</div>
```

### CSS Class Convention

| Element | Classes |
|---------|---------|
| Card container | `bg-white rounded-xl shadow-sm border border-gray-200 p-6` |
| Input field | `w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none` |
| Primary button | `px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg` |
| Cancel button | `px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg` |
| Badge (active) | `inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700` |
| Badge (inactive) | `... bg-gray-100 text-gray-600` |
| Table header | `bg-gray-50 text-gray-600 uppercase text-xs` |

### Color Palette (Tailwind config)

```js
colors: {
    brand: '#10B981',        // Emerald 500 - primary actions
    'brand-dark': '#059669', // Emerald 600 - hover state
    sidebar: '#1F2937',      // Gray 800 - sidebar background
}
```

### Flash Messages
Tự động hiển thị từ session:
```php
return redirect()->route('...')->with('success', 'Thành công!');
return back()->with('error', 'Thất bại!');
```

### Responsive
- **Desktop** (lg+): Sidebar fixed bên trái, collapsible (64→20px width)
- **Mobile** (<lg): Sidebar hidden, toggle qua hamburger menu

### Delete Confirmation
Luôn dùng `onsubmit="return confirm('...')"` trên form delete.

### Pagination
Laravel pagination tự render. Controller dùng `->paginate(15)`.

## Thêm menu sidebar mới

Mở `resources/views/admin/layouts/sidebar.blade.php`, thêm vào array `$links`:
```php
$links = [
    // ... existing
    ['route' => 'admin.newmodule.index', 'icon' => 'newmodule', 'label' => 'Module mới'],
];
```

Tạo icon file: `resources/views/admin/layouts/icons/newmodule.blade.php`

## Assets & Dependencies

Không có build step (no Vite/Webpack cho admin). Tất cả load từ CDN:
- `https://cdn.tailwindcss.com` (Tailwind CSS)
- `https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js` (Alpine.js)

Nếu sau này cần rich text editor, thêm CDN vào `@stack('scripts')` trong view cụ thể.
