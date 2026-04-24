@extends('layouts.app')

@section('title', 'Website Mới Đẹp Hơn - Cloudyy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50">
    <!-- Hero Showcase -->
    <section class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white overflow-hidden py-32">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-bounce"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-yellow-300 bg-opacity-20 rounded-full animate-pulse"></div>
            <div class="absolute bottom-40 left-20 w-12 h-12 bg-pink-300 bg-opacity-20 rounded-full animate-ping"></div>
            <div class="absolute bottom-20 right-10 w-24 h-24 bg-white bg-opacity-10 rounded-full animate-bounce" style="animation-delay: 1s"></div>
        </div>
        <div class="relative container mx-auto px-6 text-center">
            <div class="inline-block bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-6 py-3 mb-8">
                <span class="text-lg font-medium">🎉 Website Mới Đã Sẵn Sàng!</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                Thiết Kế Hiện Đại
                <span class="block text-yellow-300 animate-pulse">Đầy Ấn Tượng</span>
            </h1>
            <p class="text-xl md:text-2xl mb-12 text-indigo-100 leading-relaxed max-w-4xl mx-auto">
                Website Cloudyy giờ đây đẹp hơn bao giờ hết với thiết kế responsive,
                animation mượt mà và trải nghiệm người dùng tuyệt vời!
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="/" class="bg-white text-indigo-600 px-10 py-5 rounded-full font-bold text-xl hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-eye mr-3"></i>Xem Trang Chủ
                </a>
                <a href="/test-chatbot" class="border-2 border-white text-white px-10 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">
                    <i class="fas fa-robot mr-3"></i>Test Chatbot
                </a>
            </div>
        </div>
    </section>

    <!-- Features Showcase -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Những Cải Tiến Mới</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Chúng tôi đã nâng cấp website với hàng loạt tính năng và cải thiện thiết kế
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Header Modern -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-bars text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Header Hiện Đại</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Logo với icon gradient đẹp mắt</li>
                        <li>• Navigation với underline effect</li>
                        <li>• Mobile menu responsive hoàn hảo</li>
                        <li>• User actions với gradient buttons</li>
                    </ul>
                </div>

                <!-- Hero Section -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-rocket text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Hero Section Ấn Tượng</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Background gradient đa tầng</li>
                        <li>• Floating animations mượt mà</li>
                        <li>• Stats counter với hover effects</li>
                        <li>• Call-to-action buttons gradient</li>
                    </ul>
                </div>

                <!-- Product Cards -->
                <div class="bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-box text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Product Cards Đẹp</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Hover effects với scale animation</li>
                        <li>• Brand badges và discount tags</li>
                        <li>• Rating stars với màu vàng</li>
                        <li>• Price display với strikethrough</li>
                    </ul>
                </div>

                <!-- Chatbot Widget -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-robot text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Chatbot AI Thông Minh</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Widget hiện trên mọi trang</li>
                        <li>• AI Gemini (hoặc fallback responses)</li>
                        <li>• Typing animation và emoji</li>
                        <li>• UI responsive với shadow effects</li>
                    </ul>
                </div>

                <!-- Reviews Section -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-star text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Hệ Thống Đánh Giá</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Star rating system đẹp mắt</li>
                        <li>• Review form với validation</li>
                        <li>• Average rating calculation</li>
                        <li>• Customer testimonials section</li>
                    </ul>
                </div>

                <!-- Responsive Design -->
                <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-8 rounded-3xl shadow-lg hover:shadow-xl transition group">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <i class="fas fa-mobile-alt text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Responsive Hoàn Hảo</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Mobile-first design approach</li>
                        <li>• Tablet và desktop optimization</li>
                        <li>• Touch-friendly interactions</li>
                        <li>• Fast loading trên mọi thiết bị</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshots/Preview -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Trải Nghiệm Website Mới</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Khám phá các trang chính với thiết kế hoàn toàn mới
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Homepage -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition group">
                    <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                        <i class="fas fa-home text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Trang Chủ</h3>
                        <p class="text-gray-600 mb-4">Hero section ấn tượng với animations, features showcase, testimonials và newsletter signup.</p>
                        <a href="/" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                            <i class="fas fa-eye mr-2"></i>Xem Trang Chủ
                        </a>
                    </div>
                </div>

                <!-- Product Detail -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition group">
                    <div class="h-48 bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center">
                        <i class="fas fa-shoe-prints text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Chi Tiết Sản Phẩm</h3>
                        <p class="text-gray-600 mb-4">Layout 2 cột với hình ảnh, thông tin chi tiết, đánh giá và form review.</p>
                        <a href="#products" class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-700 transition">
                            <i class="fas fa-eye mr-2"></i>Xem Sản Phẩm
                        </a>
                    </div>
                </div>

                <!-- Chatbot Test -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition group">
                    <div class="h-48 bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center">
                        <i class="fas fa-robot text-6xl text-white"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Chatbot AI</h3>
                        <p class="text-gray-600 mb-4">Test tính năng chatbot AI với interface đẹp và responses thông minh.</p>
                        <a href="/test-chatbot" class="inline-block bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-yellow-700 transition">
                            <i class="fas fa-robot mr-2"></i>Test Chatbot
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-12">Thành Tựu Đạt Được</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="group">
                    <div class="text-5xl font-bold mb-2 group-hover:scale-110 transition transform">100%</div>
                    <div class="text-indigo-200">Responsive Design</div>
                </div>
                <div class="group">
                    <div class="text-5xl font-bold mb-2 group-hover:scale-110 transition transform">24/7</div>
                    <div class="text-indigo-200">Chatbot Hoạt Động</div>
                </div>
                <div class="group">
                    <div class="text-5xl font-bold mb-2 group-hover:scale-110 transition transform">50+</div>
                    <div class="text-indigo-200">Animations Mới</div>
                </div>
                <div class="group">
                    <div class="text-5xl font-bold mb-2 group-hover:scale-110 transition transform">4.9★</div>
                    <div class="text-indigo-200">Đánh Giá UX</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6">Sẵn Sàng Trải Nghiệm?</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Website Cloudyy giờ đây đã được nâng cấp hoàn toàn với thiết kế hiện đại,
                tính năng đầy đủ và trải nghiệm người dùng tuyệt vời!
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="/" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-10 py-5 rounded-full font-bold text-xl hover:from-indigo-600 hover:to-purple-700 transition transform hover:scale-105 shadow-2xl">
                    <i class="fas fa-home mr-3"></i>Bắt Đầu Mua Sắm
                </a>
                <a href="/test-chatbot" class="border-2 border-white text-white px-10 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-gray-900 transition transform hover:scale-105">
                    <i class="fas fa-robot mr-3"></i>Test Chatbot AI
                </a>
            </div>
        </div>
    </section>
</div>
@endsection