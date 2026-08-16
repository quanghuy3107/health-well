<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#10B981',
                        'brand-dark': '#059669',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Logo -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-extrabold text-gray-800">HomeWellness</h1>
                <p class="text-gray-500 mt-2">Đăng nhập vào hệ thống</p>
            </div>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Errors -->
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-brand focus:border-brand transition-all outline-none"
                        placeholder="email@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-brand focus:border-brand transition-all outline-none"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-brand border-gray-300 rounded focus:ring-brand">
                        <span class="ml-2 text-sm text-gray-600">Ghi nhớ đăng nhập</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-brand hover:bg-brand-dark text-white font-bold rounded-xl shadow-lg transition-all duration-300">
                    Đăng nhập
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}" class="text-brand hover:text-brand-dark font-semibold">Đăng ký</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
