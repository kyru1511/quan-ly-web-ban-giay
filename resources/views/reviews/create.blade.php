@extends("layouts.app")

@section("content")
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Thêm Bình Luận cho {{ $product->name }}</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            @csrf

            <!-- T�n kh�ch h�ng -->
            <div class="mb-6">
                <label for="customer_name" class="block text-sm font-semibold text-gray-700 mb-2">Tên của bạn</label>
                <input type="text" id="customer_name" name="customer_name" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none @error('customer_name') border-red-500 @enderror"
                       value="{{ old('customer_name') }}" required>
                @error('customer_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- ��nh gi� -->
            <div class="mb-6">
                <label for="rating" class="block text-sm font-semibold text-gray-700 mb-2">Đánh giá (1-5 sao)</label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="rating" value="{{ $i }}" 
                                   class="w-4 h-4 text-indigo-600 @error('rating') border-red-500 @enderror"
                                   {{ old('rating') == $i ? 'checked' : '' }}>
                            <span class="ml-2 text-yellow-400 text-2xl">
                                @for($j = 1; $j <= $i; $j++)
                                    ★
                                @endfor
                            </span>
                        </label>
                    @endfor
                </div>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bình luận -->
            <div class="mb-6">
                <label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">Bình luận của bạn</label>
                <textarea id="comment" name="comment" rows="6"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none @error('comment') border-red-500 @enderror"
                          placeholder="Hãy chia sẻ cảm nhận của bạn về sản phẩm này..."
                          required>{{ old('comment') }}</textarea>
                @error('comment')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- N�t submit -->
            <div class="flex gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Gửi Bình Luận
                </button>
                <a href="{{ route('product.detail', $product->id) }}" class="bg-gray-400 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-500 transition">
                    Quay Lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
