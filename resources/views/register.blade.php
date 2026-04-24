<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md">
        <div class="text-center mb-8">
            <a href="/" class="text-4xl font-extrabold text-indigo-600">SNEAKER<span class="text-gray-800">HUB</span></a>
            <p class="text-gray-500 mt-2 font-medium">Tạo tài khoản mới</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-6 font-semibold text-center">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-6 font-semibold text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('postRegister') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-bold mb-2">Họ và tên</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 bg-gray-50 outline-none transition" placeholder="Nguyễn Văn A" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Email</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 bg-gray-50 outline-none transition" placeholder="admin@gmail.com" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Mật khẩu</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="password" name="password" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 bg-gray-50 outline-none transition" placeholder="••••••••" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Xác nhận mật khẩu</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="password" name="password_confirmation" class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 bg-gray-50 outline-none transition" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-3.5 rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg">
                Đăng Ký
            </button>

            <div class="text-center mt-4">
                <p class="text-gray-500 text-sm">
                    Đã có tài khoản?
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Đăng nhập</a>
                </p>
                <a href="/" class="text-gray-500 hover:text-indigo-600 text-sm font-medium block mt-2"><i class="fas fa-arrow-left mr-1"></i> Quay lại trang chủ</a>
            </div>
        </form>
    </div>

</body>
</html>