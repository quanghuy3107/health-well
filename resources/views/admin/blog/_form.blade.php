@php $post = $post ?? null; @endphp

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
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thông tin bài viết</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề *</label>
            <input type="text" name="title" value="{{ old('title', $post?->title) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
            <input type="text" name="slug" value="{{ old('slug', $post?->slug) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Danh mục</label>
            <select name="category"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
                <option value="">— Chọn danh mục —</option>
                @foreach($blogCategories ?? [] as $cat)
                    <option value="{{ $cat->name }}" {{ old('category', $post?->category) === $cat->name ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tác giả</label>
            <input type="text" name="author" value="{{ old('author', $post?->author) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thời gian đọc</label>
            <input type="text" name="read_time" value="{{ old('read_time', $post?->read_time) }}" placeholder="6 min read"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>

<!-- Affiliate Link -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Link Affiliate</h3>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">URL Affiliate</label>
        <input type="url" name="affiliate_url" value="{{ old('affiliate_url', $post?->affiliate_url) }}" placeholder="https://www.amazon.com/dp/..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        <p class="text-xs text-gray-400 mt-1">Link mua hàng sẽ hiển thị nút "Buy Now" ở cuối bài viết. Để trống nếu không có.</p>
    </div>
</div>

<!-- Featured Image -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ảnh bìa</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            @include('admin.components.image-upload', [
                'name' => 'image',
                'value' => old('image', $post?->image),
                'label' => 'Ảnh bìa bài viết',
                'folder' => 'blog',
            ])
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Image Alt text</label>
            <input type="text" name="image_alt" value="{{ old('image_alt', $post?->image_alt) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>

<!-- Excerpt -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Tóm tắt</h3>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Excerpt * (hiển thị ở danh sách blog)</label>
        <textarea name="excerpt" rows="3" required
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ old('excerpt', $post?->excerpt) }}</textarea>
    </div>
</div>

<!-- Content with CKEditor 5 -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Nội dung bài viết *</h3>
    <p class="text-xs text-gray-500 mb-3">Sử dụng editor để viết nội dung. Bạn có thể chèn link affiliate, hình ảnh, bảng biểu trực tiếp.</p>
    <div id="ckeditor-container">
        <textarea id="ckeditor" name="content" class="hidden">{{ old('content', $post?->content) }}</textarea>
        <div id="editor"></div>
    </div>
</div>

<!-- SEO -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">SEO</h3>
    <div class="grid grid-cols-1 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
            <input type="text" name="meta_title" value="{{ old('meta_title', $post?->meta_title) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
            <p class="text-xs text-gray-400 mt-1">Khuyến nghị dưới 60 ký tự</p>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
            <textarea name="meta_description" rows="2"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ old('meta_description', $post?->meta_description) }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Khuyến nghị 120-160 ký tự</p>
        </div>
    </div>
</div>

<!-- Status -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Trạng thái</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex items-center">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" value="1" id="is_published"
                {{ old('is_published', $post?->is_published ?? false) ? 'checked' : '' }}
                class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand">
            <label for="is_published" class="ml-2 text-sm text-gray-700">Xuất bản ngay</label>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thứ tự</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $post?->sort_order ?? 0) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>

    <!-- Chọn thời gian tạo -->
    <div class="mt-4 border-t border-gray-100 pt-4">
        <div class="flex items-center mb-3">
            <input type="hidden" name="custom_date" value="0">
            <input type="checkbox" name="custom_date" value="1" id="custom_date"
                {{ old('custom_date', $post?->published_date ? '1' : '') ? 'checked' : '' }}
                class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand"
                onchange="document.getElementById('custom-date-field').classList.toggle('hidden', !this.checked)">
            <label for="custom_date" class="ml-2 text-sm text-gray-700">Tùy chỉnh thời gian đăng bài</label>
        </div>
        <div id="custom-date-field" class="{{ old('custom_date', $post?->published_date ? '1' : '') ? '' : 'hidden' }}">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ngày đăng</label>
            @php
                $dateValue = old('published_date_input');
                if (!$dateValue && $post?->published_date) {
                    try {
                        $dateValue = \Carbon\Carbon::parse($post->published_date)->format('Y-m-d\TH:i');
                    } catch (\Exception $e) {
                        $dateValue = '';
                    }
                }
            @endphp
            <input type="datetime-local" name="published_date_input" value="{{ $dateValue }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
            <p class="text-xs text-gray-400 mt-1">Để trống sẽ sử dụng thời gian hiện tại khi tạo bài viết</p>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
<style>
    .ck-editor__editable {
        min-height: 500px !important;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.7;
    }
    .ck-editor__editable a {
        color: #10b981;
    }
    .ck.ck-editor {
        border-radius: 0.5rem;
        overflow: hidden;
    }
</style>
@endpush

@push('scripts')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
        }
    }
</script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Underline,
        Strikethrough,
        Font,
        Link,
        Paragraph,
        Heading,
        List,
        TodoList,
        BlockQuote,
        Table,
        TableToolbar,
        MediaEmbed,
        Image,
        ImageToolbar,
        ImageCaption,
        ImageStyle,
        ImageResize,
        ImageUpload,
        SimpleUploadAdapter,
        Indent,
        IndentBlock,
        Alignment,
        HtmlEmbed,
        SourceEditing,
        GeneralHtmlSupport,
        CodeBlock,
        HorizontalLine,
        FullPage,
        FindAndReplace,
        Highlight,
        RemoveFormat
    } from 'ckeditor5';

    const editor = await ClassicEditor.create(document.querySelector('#editor'), {
        plugins: [
            Essentials, Bold, Italic, Underline, Strikethrough, Font,
            Link, Paragraph, Heading, List, TodoList, BlockQuote,
            Table, TableToolbar, MediaEmbed,
            Image, ImageToolbar, ImageCaption, ImageStyle, ImageResize, ImageUpload, SimpleUploadAdapter,
            Indent, IndentBlock, Alignment,
            HtmlEmbed, SourceEditing, GeneralHtmlSupport,
            CodeBlock, HorizontalLine, FindAndReplace, Highlight, RemoveFormat
        ],
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                'alignment', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'link', 'insertImage', 'mediaEmbed', 'insertTable', 'blockQuote', '|',
                'horizontalLine', 'htmlEmbed', '|',
                'highlight', 'removeFormat', '|',
                'sourceEditing', 'findAndReplace', '|',
                'undo', 'redo'
            ],
            shouldNotGroupWhenFull: false
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' }
            ]
        },
        link: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://',
            decorators: {
                openInNewTab: {
                    mode: 'manual',
                    label: 'Mở trong tab mới',
                    defaultValue: true,
                    attributes: {
                        target: '_blank',
                        rel: 'noopener noreferrer nofollow'
                    }
                },
                isAffiliate: {
                    mode: 'manual',
                    label: 'Link Affiliate (nofollow)',
                    attributes: {
                        rel: 'sponsored nofollow noopener'
                    }
                }
            }
        },
        image: {
            toolbar: ['imageStyle:block', 'imageStyle:side', '|', 'imageTextAlternative', '|', 'resizeImage'],
            resizeOptions: [
                { name: 'resizeImage:original', value: null, label: 'Original' },
                { name: 'resizeImage:50', value: '50', label: '50%' },
                { name: 'resizeImage:75', value: '75', label: '75%' }
            ]
        },
        simpleUpload: {
            uploadUrl: '/admin/upload/editor-image',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
        },
        htmlSupport: {
            allow: [
                { name: /.*/, attributes: true, classes: true, styles: true }
            ]
        },
        initialData: document.querySelector('#ckeditor').value
    });

    // Sync editor content to hidden textarea before form submit
    const form = document.querySelector('#ckeditor-container').closest('form');
    form.addEventListener('submit', () => {
        document.querySelector('#ckeditor').value = editor.getData();
    });
</script>
@endpush
