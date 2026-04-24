@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Quản Lý Bình Luận</h1>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:underline">← Dashboard</a>
    </div>

    @if(session("success"))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">
            {{ session("success") }}
        </div>
    @endif

    @if(count($reviews) > 0)
        <div class="overflow-x-auto bg-white rounded-xl shadow border border-gray-200">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50">
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Sản Phẩm</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Khách Hàng</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Đánh Giá</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Bình Luận</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Ngày</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-600">#{{ $review->id }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('product.detail', $review->product_id) }}" class="text-indigo-600 hover:underline text-sm">
                                    {{ $review->product->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $review->customer_name }}</td>
                            <td class="px-6 py-4 text-yellow-400 text-sm font-semibold">
                                @for($i = 0; $i < $review->rating; $i++)
                                    ★
                                @endfor
                                @for($i = $review->rating; $i < 5; $i++)
                                    ☆
                                @endfor
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                                {{ \Illuminate\Support\Str::limit($review->comment, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $review->created_at->format("d/m/Y") }}</td>
                            <td class="px-6 py-4 text-sm flex gap-2">
                                <a href="{{ route('admin.reviews.edit', $review->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Sửa
                                </a>
                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" onclick="return confirm('Xác nhận xóa?')">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $reviews->links() }}
        </div>
    @else
        <div class="bg-gray-100 text-gray-700 p-12 rounded-lg text-center">
            <p class="text-lg">Chưa có bình luận nào.</p>
        </div>
    @endif
</div>
@endsection
