@extends('admin.layouts.app')

@section('title', 'Cài đặt')
@section('page-title', 'Cài đặt website')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
    @csrf

    @php
        $groups = [
            'general' => ['title' => 'Thông tin chung', 'icon' => '⚙️'],
            'contact' => ['title' => 'Liên hệ', 'icon' => '📧'],
            'social' => ['title' => 'Mạng xã hội', 'icon' => '🌐'],
            'seo' => ['title' => 'SEO', 'icon' => '🔍'],
            'footer' => ['title' => 'Footer', 'icon' => '📝'],
        ];
    @endphp

    @foreach($groups as $groupKey => $groupInfo)
        @if(isset($settings[$groupKey]))
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                <span class="mr-2">{{ $groupInfo['icon'] }}</span>
                {{ $groupInfo['title'] }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($settings[$groupKey] as $setting)
                <div class="{{ in_array($setting['type'], ['textarea']) ? 'md:col-span-2' : '' }}">
                    @if($setting['type'] === 'image')
                        @include('admin.components.image-upload', [
                            'name' => $setting['key'],
                            'value' => $setting['value'],
                            'label' => $setting['label'],
                            'folder' => 'site',
                        ])
                    @elseif($setting['type'] === 'textarea')
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $setting['label'] }}</label>
                        <textarea name="{{ $setting['key'] }}" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">{{ $setting['value'] }}</textarea>
                    @else
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $setting['label'] }}</label>
                        <input type="{{ $setting['type'] }}" 
                            name="{{ $setting['key'] }}" 
                            value="{{ $setting['value'] }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @endforeach

    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">
            Lưu cài đặt
        </button>
    </div>
</form>
@endsection
