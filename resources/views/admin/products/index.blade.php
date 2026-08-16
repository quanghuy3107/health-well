@extends('admin.layouts.app')

@section('title', 'Quản lý sản phẩm')
@section('page-title', 'Sản phẩm')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="p-6 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-lg font-semibold text-gray-800">Danh sách sản phẩm</h2>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-4 py-2 bg-brand hover:bg-brand-dark text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Thêm sản phẩm
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Sản phẩm</th>
                    <th class="px-6 py-3">Danh mục</th>
                    <th class="px-6 py-3">Giá</th>
                    <th class="px-6 py-3">Rating</th>
                    <th class="px-6 py-3">Trạng thái</th>
                    <th class="px-6 py-3 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset($product->image) }}" alt="" class="w-10 h-10 rounded-lg object-cover bg-gray-100">
                            <div class="max-w-xs">
                                <p class="font-medium text-gray-800 truncate">{{ Str::limit($product->name, 50) }}</p>
                                <p class="text-xs text-gray-500">{{ $product->slug }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $product->category_label ?? $product->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-medium">{{ $product->price }}</td>
                    <td class="px-6 py-4">
                        <span class="text-yellow-500">★</span> {{ $product->star_rating }}
                    </td>
                    <td class="px-6 py-4">
                        @if($product->is_active)
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Inactive</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('admin.products.edit', $product->_id) }}" class="text-blue-600 hover:text-blue-800" title="Sửa">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product->_id) }}" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Xóa">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        Chưa có sản phẩm nào.
                        <a href="{{ route('admin.products.create') }}" class="text-brand hover:underline">Thêm mới</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($products->hasPages())
    <div class="p-6 border-t border-gray-200">
        {{ $products->links() }}
    </div>
    @endif
</div>
@endsection
