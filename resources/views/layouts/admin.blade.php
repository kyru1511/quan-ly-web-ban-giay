<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SneakerHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 transition-all duration-300">
            <div class="p-6">
                <span class="text-2xl font-bold text-indigo-400">ADMIN CP</span>
            </div>
            <nav class="mt-6 px-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-lg bg-indigo-600">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-box mr-3"></i> Quản lý Sản phẩm
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-shopping-cart mr-3"></i> Quản lý Đơn hàng
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-cog mr-3"></i> Cài đặt Website
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-comments mr-3"></i> Quản lý Bình luận
                </a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-800 transition">
                    <i class="fas fa-users mr-3"></i> Quản lý Tài khoản
                </a>
                <div class="border-t border-slate-700 my-4"></div>
                <a href="{{ route('logout') }}" class="block px-4 py-3 rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition font-medium">
                    <i class="fas fa-sign-out-alt w-6"></i> Đăng xuất
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8 bg-white p-4 rounded-xl shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800">Tổng quan hệ thống</h2>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Chào, <strong>Admin</strong></span>
                    <img src="https://ui-avatars.com/api/?name=Admin" class="w-10 h-10 rounded-full">
                </div>
            </header>

            @yield('content')
        </main>
    </div>

</body>
</html>