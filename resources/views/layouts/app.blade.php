<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Shop Cloudyy')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">
    @php
        $cart = session('cart', []);
        $cartCount = 0;
        if (is_array($cart)) {
            foreach ($cart as $item) {
                $cartCount += $item['quantity'] ?? 0;
            }
        }
    @endphp

    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-shoe-prints text-white text-lg"></i>
                    </div>
                    <span class="hidden sm:block">Cloudyy</span>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium transition relative group">
                        Trang chủ
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#products" class="text-gray-700 hover:text-indigo-600 font-medium transition relative group">
                        Sản phẩm
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition relative group">
                        Giỏ hàng
                        @if($cartCount > 0)
                            <span class="absolute -top-2 right-0 inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-500 text-white text-xs font-bold">{{ $cartCount }}</span>
                        @endif
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    @auth
                        <a href="{{ route('user.orders.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition relative group">
                            Đơn hàng của tôi
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        @if(Auth::user()->role >= 1)
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition relative group">
                                Admin
                                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-600 transition-all duration-300 group-hover:w-full"></span>
                            </a>
                        @endif
                    @endauth
                </nav>

                <!-- User Actions -->
                <div class="flex items-center gap-4">
                    @auth
                        <div class="hidden md:flex items-center gap-3">
                            <span class="text-gray-700 font-medium">Xin chào, {{ Auth::user()->name }}</span>
                            <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition">
                                <i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất
                            </a>
                        </div>
                    @else
                        <div class="hidden md:flex items-center gap-3">
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition">
                                <i class="fas fa-sign-in-alt mr-1"></i>Đăng nhập
                            </a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:from-indigo-600 hover:to-purple-700 transition">
                                <i class="fas fa-user-plus mr-1"></i>Đăng ký
                            </a>
                        </div>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-700 hover:text-indigo-600 transition">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4 border-t border-gray-200 pt-4">
                <nav class="flex flex-col gap-4">
                    <a href="/" class="text-gray-700 hover:text-indigo-600 font-medium transition py-2">
                        <i class="fas fa-home mr-2"></i>Trang chủ
                    </a>
                    <a href="#products" class="text-gray-700 hover:text-indigo-600 font-medium transition py-2">
                        <i class="fas fa-box mr-2"></i>Sản phẩm
                    </a>
                    <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition py-2 relative">
                        <i class="fas fa-shopping-cart mr-2"></i>Giỏ hàng
                        @if($cartCount > 0)
                            <span class="absolute -top-1 -right-1 inline-flex items-center justify-center w-5 h-5 rounded-full bg-red-500 text-white text-[10px] font-bold">{{ $cartCount }}</span>
                        @endif
                    </a>
                    @auth
                        <a href="{{ route('user.orders.index') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition py-2">
                            <i class="fas fa-list-alt mr-2"></i>Đơn hàng của tôi
                        </a>
                        @if(Auth::user()->role >= 1)
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition py-2">
                                <i class="fas fa-cog mr-2"></i>Admin Panel
                            </a>
                        @endif
                        <div class="py-2 border-t border-gray-200 mt-2">
                            <span class="text-gray-600 text-sm block mb-2">Xin chào, {{ Auth::user()->name }}</span>
                            <a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition inline-block">
                                <i class="fas fa-sign-out-alt mr-1"></i>Đăng xuất
                            </a>
                        </div>
                    @else
                        <div class="py-2 border-t border-gray-200 mt-2 flex gap-3">
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 font-medium transition">
                                <i class="fas fa-sign-in-alt mr-1"></i>Đăng nhập
                            </a>
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:from-indigo-600 hover:to-purple-700 transition">
                                <i class="fas fa-user-plus mr-1"></i>Đăng ký
                            </a>
                        </div>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <div class="container mx-auto px-6 py-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-200 text-green-800 px-6 py-4 rounded-xl shadow-sm mb-6">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-200 text-red-800 px-6 py-4 rounded-xl shadow-sm mb-6">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <main class="container mx-auto px-6 py-10">
        @yield('content')
    </main>

    <footer class="bg-gray-900 text-gray-300 py-12 mt-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <a href="/" class="flex items-center gap-3 text-2xl font-bold text-white mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-shoe-prints text-white text-lg"></i>
                        </div>
                        <span>Cloudyy</span>
                    </a>
                    <p class="text-gray-400 mb-6 leading-relaxed max-w-md">
                        Shop giày chính hãng uy tín với chất lượng vượt trội.
                        Mang phong cách đến với mọi bước chân của bạn.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-indigo-600 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold text-lg mb-4">Liên Kết Nhanh</h3>
                    <ul class="space-y-3">
                        <li><a href="/" class="text-gray-400 hover:text-white transition">Trang chủ</a></li>
                        <li><a href="#products" class="text-gray-400 hover:text-white transition">Sản phẩm</a></li>
                        <li><a href="{{ route('cart.index') }}" class="text-gray-400 hover:text-white transition">Giỏ hàng</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Liên hệ</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h3 class="text-white font-semibold text-lg mb-4">Hỗ Trợ</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Chính sách đổi trả</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Hướng dẫn mua hàng</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Vận chuyển</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Liên hệ</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} Cloudyy. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    @include('components.chatbot-widget')

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
