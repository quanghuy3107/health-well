@extends('admin.layouts.app')

@section('title', 'Sửa campaign')
@section('page-title', 'Sửa campaign')

@section('content')
<form method="POST" action="{{ route('admin.campaigns.update', $campaign->id) }}" class="space-y-6">
    @csrf
    @method('PUT')
    @include('admin.campaigns._form', ['campaign' => $campaign])

    @if($campaign->clicks_count > 0)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Thống kê</h3>
        <p class="text-gray-600">Tổng clicks: <span class="font-bold text-brand">{{ $campaign->clicks_count }}</span></p>
    </div>
    @endif

    <div class="flex justify-end">
        <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg mr-3">Hủy</a>
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">Cập nhật</button>
    </div>
</form>
@endsection
