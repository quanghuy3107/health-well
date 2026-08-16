{{-- 
    Image Upload Component
    Usage: @include('admin.components.image-upload', ['name' => 'image', 'value' => $product->image, 'label' => 'Ảnh chính', 'folder' => 'products'])
--}}
@php
    $name = $name ?? 'image';
    $value = $value ?? '';
    $label = $label ?? 'Hình ảnh';
    $folder = $folder ?? 'uploads';
    $required = $required ?? false;
    $inputId = 'upload_' . $name . '_' . uniqid();
@endphp

<div x-data="imageUpload('{{ $name }}', '{{ $value }}', '{{ $folder }}')" class="space-y-2">
    <label class="block text-sm font-medium text-gray-700">{{ $label }} {{ $required ? '*' : '' }}</label>
    
    <!-- Preview -->
    <div x-show="imageUrl" class="relative inline-block">
        <img :src="imageUrl.startsWith('/') ? '{{ asset('') }}' + imageUrl.substring(1) : imageUrl" 
            alt="Preview" class="h-24 w-auto object-contain rounded-lg border border-gray-200 bg-gray-50">
        <button type="button" @click="removeImage()" 
            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
            &times;
        </button>
    </div>

    <!-- Upload Area -->
    <div x-show="!uploading" class="flex items-center gap-3">
        <label :for="'{{ $inputId }}'" 
            class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-lg border border-gray-300 transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Chọn ảnh
        </label>
        <input type="file" :id="'{{ $inputId }}'" accept="image/*" @change="upload($event)" class="hidden">
        <span x-show="imageUrl" class="text-xs text-gray-500 truncate max-w-xs" x-text="imageUrl"></span>
    </div>

    <!-- Uploading -->
    <div x-show="uploading" class="flex items-center gap-2 text-sm text-brand">
        <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
        </svg>
        Đang upload...
    </div>

    <!-- Error -->
    <p x-show="error" x-text="error" class="text-xs text-red-600"></p>

    <!-- Hidden input for form submission -->
    <input type="hidden" :name="fieldName" :value="imageUrl">
</div>

@once
@push('scripts')
<script>
function imageUpload(fieldName, initialValue, folder) {
    return {
        fieldName: fieldName,
        imageUrl: initialValue || '',
        folder: folder,
        uploading: false,
        error: '',
        
        async upload(event) {
            const file = event.target.files[0];
            if (!file) return;

            // Validate
            const maxSize = 5 * 1024 * 1024; // 5MB
            if (file.size > maxSize) {
                this.error = 'File quá lớn. Tối đa 5MB.';
                return;
            }
            if (!file.type.startsWith('image/')) {
                this.error = 'Chỉ chấp nhận file ảnh.';
                return;
            }

            this.error = '';
            this.uploading = true;

            const formData = new FormData();
            formData.append('file', file);
            formData.append('folder', this.folder);

            try {
                const response = await fetch('{{ route("admin.upload.image") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData,
                });

                const data = await response.json();

                if (data.success) {
                    this.imageUrl = data.url;
                } else {
                    this.error = 'Upload thất bại. Vui lòng thử lại.';
                }
            } catch (e) {
                this.error = 'Lỗi kết nối. Vui lòng thử lại.';
            }

            this.uploading = false;
            event.target.value = '';
        },

        removeImage() {
            this.imageUrl = '';
        }
    }
}
</script>
@endpush
@endonce
