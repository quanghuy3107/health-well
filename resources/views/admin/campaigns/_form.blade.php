@php $campaign = $campaign ?? null; @endphp

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
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thông tin Campaign</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tên campaign *</label>
            <input type="text" name="name" value="{{ old('name', $campaign?->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Slug *</label>
            <input type="text" name="slug" value="{{ old('slug', $campaign?->slug) }}" required placeholder="ten-san-pham"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
            <p class="text-xs text-gray-500 mt-1">Link sẽ là: /go/<span class="font-medium">slug</span></p>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Target URL * (link affiliate gốc)</label>
            <input type="url" name="target_url" value="{{ old('target_url', $campaign?->target_url) }}" required placeholder="https://amazon.com/..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
    </div>
</div>
