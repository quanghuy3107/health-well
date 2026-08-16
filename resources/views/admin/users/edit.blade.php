@extends('admin.layouts.app')

@section('title', 'Sửa người dùng')
@section('page-title', 'Sửa người dùng')

@section('content')
<form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-6">
    @csrf
    @method('PUT')
    @include('admin.users._form', ['user' => $user])

    <div class="flex justify-end">
        <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg mr-3">Hủy</a>
        <button type="submit" class="px-6 py-2 bg-brand hover:bg-brand-dark text-white font-medium rounded-lg">Cập nhật</button>
    </div>
</form>
@endsection
