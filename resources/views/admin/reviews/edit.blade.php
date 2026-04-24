@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-2">Chỉnh Sửa Bình Luận</h1>
        <p class="text-gray-600 mb-8"><a href="{{ route('admin.reviews.index') }}" class="text-indigo-600 hover:underline">← Quay lại danh sách</a></p>

        @if($errors->any())
            <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
            @csrf
            @method('PUT')

            <!-- T�n kh�ch h�ng -->
            <div class="mb-6">
                <label for="customer_name" class="block text-sm font-semibold text-gray-700 mb-2">Tên Khách Hàng</label>
                <input type="text" id="customer_name" name="customer_name" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                       value="{{ old('customer_name', $review->customer_name) }}" required>
            </div>

            <!-- ��nh gi� -->
            <div class="mb-6">
                <label for="rating" class="block text-sm font-semibold text-gray-700 mb-2">Đánh Giá (1-5 sao)</label>
                <select id="rating" name="rating" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                            {{ $i }} Sao
                        </option>
                    @endfor
                </select>
            </div>

            <!-- B�nh lu?n -->
            <div class="mb-6">
                <label for="comment" class="block text-sm font-semibold text-gray-700 mb-2">Bình Luận</label>
                <textarea id="comment" name="comment" rows="8"
                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none"
                          required>{{ old('comment', $review->comment) }}</textarea>
            </div>

            <!-- S?n ph?m -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600">
                    <strong>S?n ph?m:</strong> <a href="{{ route('product.detail', $review->product_id) }}" class="text-indigo-600 hover:underline">{{ $review->product->name }}</a>
                </p>
                <p class="text-sm text-gray-600 mt-2">
                    <strong>Ng�y:</strong> {{ $review->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <!-- N�t submit -->
            <div class="flex gap-4">
                <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    Lưu Thay Đổi
                </button>
                <a href="{{ route('admin.reviews.index') }}" class="bg-gray-400 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-500 transition">
                    Hủy
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
