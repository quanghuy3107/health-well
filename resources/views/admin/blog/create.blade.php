@extends('admin.layouts.app')

@section('title', 'Thêm bài viết')
@section('page-title', 'Thêm bài viết mới')

@section('content')
<form method="POST" action="{{ route('admin.blog.store') }}" class="space-y-6">
    @csrf
    @include('admin.blog._form')

    <div class="flex justify-end">
        <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg mr-3">Hủy</a>
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">Tạo bài viết</button>
    </div>
</form>
@endsection
