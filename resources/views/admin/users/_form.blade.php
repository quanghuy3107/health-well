@php $user = $user ?? null; @endphp

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
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Thông tin người dùng</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Họ tên *</label>
            <input type="text" name="name" value="{{ old('name', $user?->name) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email', $user?->email) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu {{ $user ? '(để trống nếu không đổi)' : '*' }}</label>
            <input type="password" name="password" {{ $user ? '' : 'required' }}
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none"
                placeholder="Tối thiểu 8 ký tự">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
            <select name="role" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-brand focus:border-brand outline-none">
                <option value="user" {{ old('role', $user?->role) === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user?->role) === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
    </div>
</div>
