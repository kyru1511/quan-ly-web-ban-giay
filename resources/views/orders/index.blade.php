@extends('layouts.app')

@section('title', 'Đơn hàng của tôi')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Đơn hàng của tôi</h1>
            <p class="text-gray-600 mt-2">Xem tình trạng và chi tiết các đơn hàng bạn đã đặt.</p>
        </div>
        <a href="/" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-3 rounded-xl hover:bg-indigo-700 transition">
            <i class="fas fa-shopping-bag"></i> Mua sắm tiếp
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(count($orders) > 0)
        <div class="grid gap-6">
            @foreach($orders as $order)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Mã đơn hàng #{{ $order->id }}</p>
                            <h2 class="text-xl font-semibold text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</h2>
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-sm font-semibold {{ $order->status_badge_class }}">
                                {{ $order->status_text }}
                            </span>
                            <span class="text-gray-600">{{ number_format($order->total_amount, 0, ',', '.') }}₫</span>
                        </div>
                    </div>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-2xl bg-gray-50 p-4">
                            <p class="text-sm text-gray-500">Phương thức thanh toán</p>
                            <p class="font-semibold text-gray-900 capitalize">{{ $order->payment_method }}</p>
                        </div>
                        <div class="rounded-2xl bg-gray-50 p-4">
                            <p class="text-sm text-gray-500">Địa chỉ nhận hàng</p>
                            <p class="font-semibold text-gray-900">{{ $order->customer_address }}</p>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <a href="{{ route('user.orders.show', $order->id) }}" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-5 py-3 rounded-xl hover:bg-indigo-700 transition">
                            <i class="fas fa-eye"></i> Xem chi tiết
                        </a>
                        <span class="text-sm text-gray-500">Tổng {{ count($order->items) }} sản phẩm</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-10 text-center">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Bạn chưa có đơn hàng nào</h2>
            <p class="text-gray-600 mb-6">Đặt hàng ngay để xem trạng thái và tiến trình giao nhận tại đây.</p>
            <a href="/" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 transition">
                <i class="fas fa-shopping-cart"></i> Mua sắm ngay
            </a>
        </div>
    @endif
</div>
@endsection
