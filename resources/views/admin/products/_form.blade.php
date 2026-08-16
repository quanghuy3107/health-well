@php $product = $product ?? null; @endphp

@if($errors->any())
<div class="p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
    <ul class="list-disc list-inside">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- Basic Info -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thông tin cơ bản</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tên sản phẩm *</label>
            <input type="text" name="name" value="{{ old('name', $product?->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
            <input type="text" name="slug" value="{{ old('slug', $product?->slug) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Danh mục *</label>
            <select name="category" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ old('category', $product?->category) == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn *</label>
            <textarea name="description" rows="2" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ old('description', $product?->description) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết</label>
            <textarea name="long_description" rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ old('long_description', $product?->long_description) }}</textarea>
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
                'value' => old('image', $product?->image),
                'label' => 'Ảnh chính *',
                'folder' => 'products',
                'required' => true,
            ])
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Ảnh gallery (nhiều ảnh)</label>
            <div x-data="galleryUpload({{ json_encode(old('gallery_images', $product?->gallery_images ?? [])) }})" class="space-y-3">
                <!-- Gallery Preview -->
                <div class="flex flex-wrap gap-2">
                    <template x-for="(img, index) in images" :key="index">
                        <div class="relative">
                            <img :src="img.startsWith('/') ? '{{ asset('') }}' + img.substring(1) : img" 
                                class="h-16 w-16 object-cover rounded-lg border border-gray-200">
                            <button type="button" @click="removeImage(index)"
                                class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-[10px] hover:bg-red-600">
                                &times;
                            </button>
                        </div>
                    </template>
                </div>

                <!-- Add button -->
                <div class="flex items-center gap-3">
                    <label class="cursor-pointer inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-lg border border-gray-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Thêm ảnh
                        <input type="file" accept="image/*" @change="addImage($event)" class="hidden" multiple>
                    </label>
                    <span x-show="uploading" class="text-sm text-brand">Đang upload...</span>
                </div>

                <!-- Hidden inputs -->
                <template x-for="(img, index) in images" :key="'hidden_'+index">
                    <input type="hidden" name="gallery_images[]" :value="img">
                </template>
            </div>
        </div>
    </div>
</div>

<!-- Pricing -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Giá & Đánh giá</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giá gốc</label>
            <input type="text" name="original_price" value="{{ old('original_price', $product?->original_price) }}" placeholder="$999.99"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giá bán *</label>
            <input type="text" name="price" value="{{ old('price', $product?->price) }}" required placeholder="$899.99"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giá số (numeric) *</label>
            <input type="number" step="0.01" name="price_numeric" value="{{ old('price_numeric', $product?->price_numeric) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Giảm giá (%)</label>
            <input type="number" name="discount_percentage" value="{{ old('discount_percentage', $product?->discount_percentage) }}" min="0" max="100"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Star Rating (0-5)</label>
            <input type="number" step="0.1" name="star_rating" value="{{ old('star_rating', $product?->star_rating) }}" min="0" max="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Số reviews</label>
            <input type="number" name="review_count" value="{{ old('review_count', $product?->review_count) }}" min="0"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>

<!-- Affiliate Link -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Affiliate Link</h3>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Link affiliate</label>
        <input type="text" name="affiliate_link" value="{{ old('affiliate_link', $product?->affiliate_link) }}" placeholder="/go/product-slug"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        <p class="text-xs text-gray-500 mt-1">Dùng dạng /go/slug (link cloaking) hoặc URL đầy đủ</p>
    </div>
</div>

<!-- Status -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Trạng thái</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex items-center">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" id="is_active"
                {{ old('is_active', $product?->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand">
            <label for="is_active" class="ml-2 text-sm text-gray-700">Kích hoạt sản phẩm</label>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thứ tự sắp xếp</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $product?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>

@push('scripts')
<script>
function galleryUpload(initial) {
    return {
        images: initial || [],
        uploading: false,

        async addImage(event) {
            const files = event.target.files;
            if (!files.length) return;

            this.uploading = true;

            for (let file of files) {
                if (file.size > 5 * 1024 * 1024) continue;
                if (!file.type.startsWith('image/')) continue;

                const formData = new FormData();
                formData.append('file', file);
                formData.append('folder', 'products');

                try {
                    const response = await fetch('{{ route("admin.upload.image") }}', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                        body: formData,
                    });
                    const data = await response.json();
                    if (data.success) {
                        this.images.push(data.url);
                    }
                } catch (e) {}
            }

            this.uploading = false;
            event.target.value = '';
        },

        removeImage(index) {
            this.images.splice(index, 1);
        }
    }
}
</script>
@endpush
