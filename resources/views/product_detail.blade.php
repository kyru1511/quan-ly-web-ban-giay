@extends('layouts.app')

@section('title', $product->name . ' - Cloudyy')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-4">
    <div class="container mx-auto px-6">
        <nav class="flex items-center gap-2 text-sm text-gray-600">
            <a href="/" class="hover:text-indigo-600 transition">Trang chủ</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="#products" class="hover:text-indigo-600 transition">Sản phẩm</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-900 font-medium">{{ $product->name }}</span>
        </nav>
    </div>
</div>

<!-- Product Detail -->
<section class="py-12">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <!-- Product Images -->
                <div class="relative bg-gray-50 p-8 flex items-center justify-center min-h-[500px]">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}"
                         class="max-w-full max-h-[400px] object-contain rounded-2xl shadow-lg hover:scale-105 transition duration-500">
                </div>

                <!-- Product Info -->
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <!-- Brand Badge -->
                    <span class="inline-block bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-bold uppercase tracking-wider mb-4 w-fit">
                        {{ $product->brand }}
                    </span>

                    <!-- Product Title -->
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <!-- Rating -->
                    <div class="flex items-center gap-4 mb-6">
                        <div class="flex text-yellow-400 text-xl">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($avgRating))
                                    <i class="fas fa-star"></i>
                                @elseif($i - 0.5 <= $avgRating)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600 font-medium">
                            {{ number_format($avgRating, 1) }} / 5.0
                        </span>
                        <span class="text-gray-400">
                            ({{ $product->reviews->count() }} đánh giá)
                        </span>
                    </div>

                    <!-- Price -->
                    <div class="mb-8">
                        <div class="flex items-center gap-4 mb-2">
                            <span class="text-4xl font-bold text-indigo-600">
                                {{ number_format($product->price, 0, ',', '.') }}₫
                            </span>
                            <span class="text-xl text-gray-500 line-through">
                                {{ number_format($product->price * 1.2, 0, ',', '.') }}₫
                            </span>
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-bold">
                                -17%
                            </span>
                        </div>
                        <p class="text-green-600 font-medium">
                            <i class="fas fa-check-circle mr-2"></i>Tiết kiệm {{ number_format($product->price * 0.2, 0, ',', '.') }}₫
                        </p>
                    </div>

                    <!-- Description -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Mô tả sản phẩm</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Tính năng nổi bật</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-shield-alt text-green-500"></i>
                                <span class="text-gray-700">Chính hãng 100%</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-truck text-blue-500"></i>
                                <span class="text-gray-700">Giao hàng tận nơi</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-undo text-orange-500"></i>
                                <span class="text-gray-700">Đổi trả 7 ngày</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-headset text-purple-500"></i>
                                <span class="text-gray-700">Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart -->
                    <div class="flex gap-4">
                        <a href="{{ route('cart.add', $product->id) }}"
                           class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-4 px-8 rounded-2xl font-bold text-lg hover:from-indigo-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg text-center">
                            <i class="fas fa-cart-plus mr-2"></i>Thêm vào giỏ hàng
                        </a>
                        <button class="bg-gray-100 text-gray-700 p-4 rounded-2xl hover:bg-gray-200 transition">
                            <i class="fas fa-heart text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Đánh giá từ khách hàng</h2>
                <div class="text-right">
                    <div class="text-3xl font-bold text-indigo-600">{{ number_format($avgRating, 1) }}</div>
                    <div class="flex text-yellow-400 mb-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($avgRating))
                                <i class="fas fa-star"></i>
                            @elseif($i - 0.5 <= $avgRating)
                                <i class="fas fa-star-half-alt"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="text-sm text-gray-500">{{ $product->reviews->count() }} đánh giá</div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Reviews List -->
                <div class="lg:col-span-2 space-y-6 max-h-[600px] overflow-y-auto pr-4">
                    @forelse($product->reviews as $review)
                        <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-indigo-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $review->customer_name }}</h4>
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    ★
                                                @else
                                                    ☆
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500">{{ $review->created_at->format('d/m/Y') }}</span>
                            </div>
                            <p class="text-gray-700 italic leading-relaxed">"{{ $review->comment }}"</p>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <i class="fas fa-comments text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Chưa có đánh giá nào</h3>
                            <p class="text-gray-500">Hãy là người đầu tiên chia sẻ trải nghiệm của bạn!</p>
                        </div>
                    @endforelse
                </div>

                <!-- Write Review -->
                <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-8 rounded-2xl border border-indigo-100">
                    <h3 class="text-2xl font-bold text-indigo-900 mb-6">Viết đánh giá của bạn</h3>

                    @if($errors->any())
                        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-xl mb-6">
                            <ul class="text-sm">
                                @foreach($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-indigo-900 font-semibold mb-2">Tên của bạn</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                   class="w-full px-4 py-3 border border-indigo-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                                   placeholder="Nhập tên của bạn" required>
                        </div>

                        <div>
                            <label class="block text-indigo-900 font-semibold mb-2">Chấm điểm (1-5 sao)</label>
                            <div class="flex gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}"
                                           {{ old('rating') == $i ? 'checked' : '' }} required
                                           class="sr-only peer">
                                    <label for="star{{ $i }}"
                                           class="cursor-pointer text-2xl text-gray-300 peer-checked:text-yellow-400 hover:text-yellow-400 transition">
                                        ★
                                    </label>
                                @endfor
                            </div>
                        </div>

                        <div>
                            <label class="block text-indigo-900 font-semibold mb-2">Cảm nhận của bạn</label>
                            <textarea name="comment" rows="4"
                                      class="w-full px-4 py-3 border border-indigo-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition resize-none"
                                      placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm này..." required>{{ old('comment') }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-4 rounded-xl font-bold hover:from-indigo-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
                            <i class="fas fa-paper-plane mr-2"></i>Gửi Đánh Giá
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Sản phẩm liên quan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- This would be populated with related products in a real implementation -->
            <div class="bg-gray-50 p-6 rounded-2xl text-center">
                <i class="fas fa-shoe-prints text-6xl text-gray-300 mb-4"></i>
                <h3 class="font-semibold text-gray-600">Sản phẩm liên quan sẽ hiển thị ở đây</h3>
            </div>
        </div>
    </div>
</section>
@endsection
