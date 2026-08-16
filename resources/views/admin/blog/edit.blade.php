@extends('admin.layouts.app')

@section('title', 'Sửa bài viết')
@section('page-title', 'Sửa bài viết')

@section('content')
<form method="POST" action="{{ route('admin.blog.update', $post->_id) }}" class="space-y-6">
    @csrf
    @method('PUT')
    @include('admin.blog._form', ['post' => $post])

    <div class="flex justify-end">
        <a href="{{ route('admin.blog.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg mr-3">Hủy</a>
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">Cập nhật</button>
    </div>
</form>
@endsection
