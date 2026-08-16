@php $category = $category ?? null; @endphp

@if($errors->any())
<div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thông tin danh mục</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tên danh mục *</label>
            <input type="text" name="name" value="{{ old('name', $category?->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
            <input type="text" name="slug" value="{{ old('slug', $category?->slug) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ old('description', $category?->description) }}</textarea>
        </div>
    </div>
</div>

<!-- Images -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Hình ảnh</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            @include('admin.components.image-upload', [
                'name' => 'image',
                'value' => old('image', $category?->image),
                'label' => 'Ảnh danh mục',
                'folder' => 'categories',
            ])
        </div>
        <div>
            @include('admin.components.image-upload', [
                'name' => 'banner_image',
                'value' => old('banner_image', $category?->banner_image),
                'label' => 'Banner image',
                'folder' => 'categories',
            ])
        </div>
    </div>
</div>

<!-- Banner Info -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Banner</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Banner Title</label>
            <input type="text" name="banner_title" value="{{ old('banner_title', $category?->banner_title) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Banner Subtitle</label>
            <input type="text" name="banner_subtitle" value="{{ old('banner_subtitle', $category?->banner_subtitle) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>

<!-- Status -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Trạng thái</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active"
                {{ old('is_active', $category?->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Kích hoạt</label>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thứ tự</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $category?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>
