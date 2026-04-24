@extends("layouts.app")

@section("content")
<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-2">Bình Luận cho {{ $product->name }}</h1>
    <p class="text-gray-600 mb-8"><a href="{{ route('product.detail', $product->id) }}" class="text-indigo-600 hover:underline">← Quay lại sản phẩm</a></p>

    @if(count($reviews) > 0)
        <div class="space-y-6">
            @foreach($reviews as $review)
                <div class="bg-white p-6 rounded-xl shadow border border-gray-200">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $review->customer_name }}</h3>
                            <p class="text-sm text-gray-500">{{ $review->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="text-yellow-400">
                            @for($i = 0; $i < $review->rating; $i++)
                                ★
                            @endfor
                            @for($i = $review->rating; $i < 5; $i++)
                                ☆
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-700">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="bg-gray-100 text-gray-700 p-8 rounded-lg text-center">
            <p class="text-lg">Chưa có bình luận nào cho sản phẩm này.</p>
            <a href="{{ route('reviews.create', $product->id) }}" class="inline-block mt-4 bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                Thêm Bình Luận Đầu Tiên
            </a>
        </div>
    @endif

    <div class="mt-12">
        <a href="{{ route('reviews.create', $product->id) }}" class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
            + Thêm Bình Luận
        </a>
    </div>
</div>
@endsection
