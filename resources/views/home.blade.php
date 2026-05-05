@extends('layouts.app')

@section('title', 'Shop Giày Chính Hãng - Cloudyy')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white overflow-hidden py-20">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute inset-0">
        <div class="absolute top-12 left-10 w-16 h-16 bg-white/10 rounded-full animate-bounce"></div>
        <div class="absolute top-24 right-16 w-12 h-12 bg-yellow-300/20 rounded-full animate-pulse"></div>
        <div class="absolute bottom-16 left-16 w-10 h-10 bg-pink-300/20 rounded-full animate-ping"></div>
    </div>
    <div class="relative container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-[0.95fr_1.05fr] gap-10 items-start mb-8">
            <div class="relative lg:pr-6">
                <div class="flex items-center gap-4 mb-6">
                    @if(!empty($logo))
                        <div class="w-16 h-16 rounded-3xl border border-white/20 bg-white/10 flex items-center justify-center">
                            <img src="{{ asset($logo) }}" alt="Cloudyy Logo" class="w-12 h-12 object-contain rounded-full">
                        </div>
                    @endif
                    <div>
                        <p class="text-xs uppercase tracking-[0.35em] text-white/70 font-semibold mb-1">Shop Cloudyy</p>
                        <h2 class="text-2xl md:text-3xl font-extrabold">Thương hiệu giày thời trang</h2>
                    </div>
                </div>

                <div class="inline-flex items-center gap-3 bg-white/10 border border-white/20 rounded-full px-4 py-2 mb-5">
                    <span class="text-sm font-medium">{{ $hero['promo_text'] }}</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold mb-5 leading-tight max-w-3xl">
                    {{ $hero['title'] }}
                    <span class="block text-yellow-300">{{ $hero['highlight'] }}</span>
                    Chính Hãng
                </h1>
                <p class="text-base md:text-lg mb-8 text-indigo-100 max-w-2xl leading-relaxed">
                    {{ $hero['subtitle'] }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start mb-8">
                    <a href="{{ $hero['cta_link'] ?: '#products' }}" class="bg-white text-indigo-600 px-7 py-3 rounded-full font-semibold text-base hover:bg-gray-100 transition shadow-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>{{ $hero['cta_text'] ?: 'Mua Ngay' }}
                    </a>
                    <a href="#features" class="border border-white/70 text-white px-7 py-3 rounded-full font-semibold text-base hover:bg-white hover:text-indigo-600 transition">
                        <i class="fas fa-info-circle mr-2"></i>Tìm Hiểu Thêm
                    </a>
                </div>
                <div class="grid grid-cols-3 gap-4 max-w-md mx-auto lg:mx-0 text-center">
                    <div>
                        <div class="text-2xl font-bold text-yellow-300">500+</div>
                        <div class="text-sm text-indigo-100">Sản phẩm</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-yellow-300">10k+</div>
                        <div class="text-sm text-indigo-100">Khách hàng</div>
                    </div>
                    <div>
                        <div class="text-2xl font-bold text-yellow-300">4.9★</div>
                        <div class="text-sm text-indigo-100">Đánh giá</div>
                    </div>
                </div>
            </div>
            <div class="order-first">
                <div class="relative z-20 rounded-[2rem] bg-white/10 border border-white/20 backdrop-blur-xl p-5 shadow-2xl overflow-hidden">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-sm text-white/80">Bộ sưu tập nổi bật</p>
                            <h2 class="text-2xl font-bold text-white">Hot Picks</h2>
                        </div>
                        <div class="rounded-full bg-white/10 px-3 py-2 text-sm text-white/90">{{ count($slides) }} slide</div>
                    </div>

                    <div class="relative overflow-hidden rounded-[1.5rem] bg-indigo-700/70">
                        @foreach($slides as $index => $slide)
                            <div class="slider-slide {{ $index === 0 ? 'active' : 'hidden' }} p-8 transition-all duration-500" data-slide="{{ $index }}">
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-sm uppercase tracking-[0.2em] text-white/80">{{ $slide['category'] }}</span>
                                    <span class="text-sm text-white/80">{{ $slide['badge'] }}</span>
                                </div>
                                <div class="mb-6">
                                    <h3 class="text-3xl font-bold text-white mb-2">{{ $slide['title'] }}</h3>
                                    <p class="text-sm text-white/80 leading-relaxed">{{ $slide['subtitle'] }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="text-white text-sm">{{ $slide['price_label'] }}</div>
                                        <div class="text-3xl font-bold text-yellow-300">{{ $slide['price_value'] }}</div>
                                    </div>
                                    <div class="w-24 h-24 rounded-3xl bg-white/10 flex items-center justify-center">
                                        <i class="{{ $slide['icon_class'] }} text-3xl text-yellow-300"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <button type="button" id="hero-prev" class="rounded-full bg-white/10 px-4 py-3 text-white hover:bg-white/20 transition">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div class="flex items-center gap-2">
                            @foreach($slides as $index => $slide)
                                <button type="button" class="hero-dot w-3 h-3 rounded-full bg-white/40" data-slide="{{ $index }}"></button>
                            @endforeach
                        </div>
                        <button type="button" id="hero-next" class="rounded-full bg-white/10 px-4 py-3 text-white hover:bg-white/20 transition">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tại Sao Chọn Cloudyy?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Chúng tôi cam kết mang đến trải nghiệm mua sắm tốt nhất với chất lượng sản phẩm vượt trội
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-200 transition">
                    <i class="fas fa-shield-alt text-3xl text-indigo-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Chính Hãng 100%</h3>
                <p class="text-gray-600 leading-relaxed">
                    Tất cả sản phẩm đều là hàng chính hãng từ các thương hiệu uy tín,
                    có giấy tờ chứng nhận đầy đủ.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-green-200 transition">
                    <i class="fas fa-truck text-3xl text-green-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Giao Hàng Miễn Phí</h3>
                <p class="text-gray-600 leading-relaxed">
                    Miễn phí giao hàng cho đơn hàng từ 1.000.000đ.
                    Giao hàng tận nơi trong 2-3 ngày.
                </p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-red-200 transition">
                    <i class="fas fa-undo text-3xl text-red-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Đổi Trả Dễ Dàng</h3>
                <p class="text-gray-600 leading-relaxed">
                    Chính sách đổi trả trong 7 ngày với sản phẩm còn nguyên tem mác,
                    nguyên vẹn bao bì.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Sản Phẩm Nổi Bật</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Khám phá bộ sưu tập giày sneaker hot nhất với chất lượng vượt trội
            </p>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-gray-50 rounded-2xl p-8 mb-12 shadow-sm">
            <form method="GET" action="{{ route('home') }}" class="flex flex-col lg:flex-row gap-6 items-center justify-center">
                <!-- Search Input -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Tìm kiếm sản phẩm..."
                               class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex-1 max-w-md">
                    <select name="category" class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm appearance-none">
                        <option value="">Tất cả giày</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand Filter -->
                <div class="flex-1 max-w-md">
                    <select name="brand" class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm appearance-none">
                        <option value="">Tất cả thương hiệu</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Search Button -->
                <div class="flex gap-3">
                    <button type="submit" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-indigo-700 transition shadow-lg">
                        <i class="fas fa-search mr-2"></i>Tìm Kiếm
                    </button>
                    @if(request('search') || request('category'))
                        <a href="{{ route('home') }}" class="bg-gray-500 text-white px-6 py-4 rounded-xl font-semibold hover:bg-gray-600 transition shadow-lg">
                            <i class="fas fa-times mr-2"></i>Xóa Bộ Lọc
                        </a>
                    @endif
                </div>
            </form>

            <!-- Active Filters Display -->
            @if(request('search') || request('category') || request('brand'))
                <div class="mt-6 flex flex-wrap gap-3 justify-center">
                    @if(request('search'))
                        <span class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-medium">
                            <i class="fas fa-search"></i>
                            Tìm: "{{ request('search') }}"
                        </span>
                    @endif
                    @if(request('category'))
                        @php
                            $selectedCategory = $categories->where('slug', request('category'))->first();
                        @endphp
                        @if($selectedCategory)
                            <span class="inline-flex items-center gap-2 bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-medium">
                                <i class="fas fa-tag"></i>
                                Danh mục: {{ $selectedCategory->name }}
                            </span>
                        @endif
                    @endif
                    @if(request('brand'))
                        <span class="inline-flex items-center gap-2 bg-orange-100 text-orange-800 px-4 py-2 rounded-full text-sm font-medium">
                            <i class="fas fa-star"></i>
                            Thương hiệu: {{ request('brand') }}
                        </span>
                    @endif
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-6 py-4 rounded-xl mb-8 font-semibold shadow-sm text-center max-w-2xl mx-auto">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 group overflow-hidden border border-gray-100">
                <!-- Product Image -->
                <div class="relative overflow-hidden h-64">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition duration-300"></div>

                    <!-- Quick Actions -->
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="{{ route('cart.add', $product->id) }}"
                           class="bg-white text-gray-900 p-3 rounded-full shadow-lg hover:bg-indigo-600 hover:text-white transition">
                            <i class="fas fa-cart-plus"></i>
                        </a>
                    </div>

                    <!-- Brand Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                            {{ $product->brand }}
                        </span>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-6">
                    <a href="{{ route('product.detail', $product->id) }}">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-indigo-600 transition line-clamp-2">
                            {{ $product->name }}
                        </h3>
                    </a>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $product->description }}
                    </p>

                    <!-- Rating -->
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 mr-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-500">(4.5)</span>
                    </div>

                    <!-- Price and Action -->
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-indigo-600">
                                {{ number_format($product->price, 0, ',', '.') }}₫
                            </span>
                            <span class="text-sm text-gray-500 line-through">
                                {{ number_format($product->price * 1.2, 0, ',', '.') }}₫
                            </span>
                        </div>

                        <a href="{{ route('product.detail', $product->id) }}"
                           class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition transform hover:scale-105">
                            Xem Chi Tiết
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12">
            <a href="#all-products" class="bg-gray-900 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-indigo-600 transition transform hover:scale-105 shadow-lg inline-block">
                <i class="fas fa-eye mr-2"></i>Xem Tất Cả Sản Phẩm
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="group">
                <div class="text-4xl font-bold mb-2 group-hover:scale-110 transition transform">1000+</div>
                <div class="text-indigo-200">Khách Hàng Hài Lòng</div>
            </div>
            <div class="group">
                <div class="text-4xl font-bold mb-2 group-hover:scale-110 transition transform">500+</div>
                <div class="text-indigo-200">Sản Phẩm Chất Lượng</div>
            </div>
            <div class="group">
                <div class="text-4xl font-bold mb-2 group-hover:scale-110 transition transform">50+</div>
                <div class="text-indigo-200">Thương Hiệu Uy Tín</div>
            </div>
            <div class="group">
                <div class="text-4xl font-bold mb-2 group-hover:scale-110 transition transform">24/7</div>
                <div class="text-indigo-200">Hỗ Trợ Khách Hàng</div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 bg-gray-900 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-4">Đăng Ký Nhận Tin Mới</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Nhận thông tin về sản phẩm mới, khuyến mãi hấp dẫn và xu hướng thời trang giày sneaker
        </p>

        <div class="max-w-md mx-auto">
            <form class="flex gap-4">
                <input type="email" placeholder="Nhập email của bạn"
                       class="flex-1 px-6 py-4 rounded-full text-gray-900 font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-4 rounded-full font-bold hover:bg-indigo-700 transition transform hover:scale-105">
                    <i class="fas fa-paper-plane mr-2"></i>Đăng Ký
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Khách Hàng Nói Gì</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Những đánh giá chân thực từ khách hàng đã trải nghiệm dịch vụ của chúng tôi
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                <div class="flex text-yellow-400 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-700 mb-6 italic leading-relaxed">
                    "Cloudyy có bộ sưu tập giày sneaker rất đa dạng và chất lượng.
                    Tôi đã mua 3 đôi giày ở đây và đều rất hài lòng với chất lượng cũng như dịch vụ."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">N</span>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Nguyễn Văn A</div>
                        <div class="text-sm text-gray-600">Khách hàng VIP</div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-blue-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                <div class="flex text-yellow-400 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-700 mb-6 italic leading-relaxed">
                    "Giao hàng nhanh chóng, đóng gói cẩn thận. Chính sách đổi trả rất rõ ràng và dễ hiểu.
                    Tôi sẽ tiếp tục ủng hộ Cloudyy trong tương lai."
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-blue-600 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">T</span>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Trần Thị B</div>
                        <div class="text-sm text-gray-600">Khách hàng thân thiết</div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-pink-50 to-red-50 p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                <div class="flex text-yellow-400 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-700 mb-6 italic leading-relaxed">
                    "Website đẹp, dễ sử dụng. Tư vấn viên rất nhiệt tình và am hiểu sản phẩm.
                    Giá cả cạnh tranh so với thị trường. Highly recommended!"
                </p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-red-600 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">L</span>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900">Lê Văn C</div>
                        <div class="text-sm text-gray-600">Khách hàng mới</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Sẵn Sàng Sở Hữu Đôi Giày Hoàn Hảo?</h2>
        <p class="text-xl mb-8 text-indigo-100 max-w-2xl mx-auto">
            Khám phá ngay bộ sưu tập giày sneaker chất lượng cao với giá ưu đãi đặc biệt
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#products" class="bg-white text-indigo-600 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-2xl">
                <i class="fas fa-shopping-cart mr-2"></i>Mua Sắm Ngay
            </a>
            <a href="#contact" class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">
                <i class="fas fa-phone mr-2"></i>Liên Hệ Tư Vấn
            </a>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.slider-slide');
        const dots = document.querySelectorAll('.hero-dot');
        const prevBtn = document.getElementById('hero-prev');
        const nextBtn = document.getElementById('hero-next');
        let currentSlide = 0;

        function updateSlider(index) {
            slides.forEach((slide, idx) => {
                slide.classList.toggle('hidden', idx !== index);
                slide.classList.toggle('active', idx === index);
            });
            dots.forEach((dot, idx) => {
                dot.classList.toggle('bg-white', idx === index);
                dot.classList.toggle('bg-white/40', idx !== index);
            });
        }

        function showNext() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlider(currentSlide);
        }

        function showPrev() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlider(currentSlide);
        }

        if (nextBtn) nextBtn.addEventListener('click', showNext);
        if (prevBtn) prevBtn.addEventListener('click', showPrev);

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                currentSlide = Number(this.dataset.slide);
                updateSlider(currentSlide);
            });
        });

        setInterval(showNext, 7000);
        updateSlider(currentSlide);
    });
</script>
@endsection
