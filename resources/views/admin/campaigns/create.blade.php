@extends('admin.layouts.app')

@section('title', 'Thêm campaign')
@section('page-title', 'Thêm campaign mới')

@section('content')
<form method="POST" action="{{ route('admin.campaigns.store') }}" class="space-y-6">
    @csrf
    @include('admin.campaigns._form')

    <div class="flex justify-end">
        <a href="{{ route('admin.campaigns.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg mr-3">Hủy</a>
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">Tạo campaign</button>
    </div>
</form>
@endsection
