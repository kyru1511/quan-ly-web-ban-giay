@extends('layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold">Chi tiết đơn hàng #{{ $order->id }}</h1>
            <p class="text-gray-600 mt-2">Tình trạng đơn hàng hiện tại: <strong>{{ $order->status_text }}</strong></p>
        </div>
        <a href="{{ route('user.orders.index') }}" class="inline-flex items-center gap-2 bg-gray-100 text-gray-800 px-5 py-3 rounded-xl hover:bg-gray-200 transition">
            <i class="fas fa-arrow-left"></i> Quay lại đơn hàng
        </a>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold mb-4">Sản phẩm trong đơn hàng</h2>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex flex-wrap gap-4 items-center justify-between bg-gray-50 rounded-3xl p-4">
                            <div>
                                <p class="font-semibold text-gray-900">{{ $item->product->name ?? 'Sản phẩm đã xóa' }}</p>
                                <p class="text-sm text-gray-500">Số lượng: {{ $item->quantity }}</p>
                            </div>
                            <p class="font-semibold text-rose-600">{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold mb-4">Thông tin giao hàng</h2>
                <p class="text-sm text-gray-500">Người nhận</p>
                <p class="font-semibold text-gray-900">{{ $order->customer_name }}</p>
                <p class="text-sm text-gray-500 mt-4">Số điện thoại</p>
                <p class="font-semibold text-gray-900">{{ $order->customer_phone }}</p>
                <p class="text-sm text-gray-500 mt-4">Địa chỉ</p>
                <p class="font-semibold text-gray-900">{{ $order->customer_address }}</p>
                @if($order->notes)
                    <p class="text-sm text-gray-500 mt-4">Ghi chú</p>
                    <p class="font-semibold text-gray-900">{{ $order->notes }}</p>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold mb-4">Tổng quan đơn hàng</h2>
                <div class="space-y-4 text-sm text-gray-600">
                    <div class="flex justify-between">
                        <span>Phương thức thanh toán</span>
                        <span class="font-semibold text-gray-900 capitalize">{{ $order->payment_method }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tổng tiền</span>
                        <span class="font-semibold text-rose-600">{{ number_format($order->total_amount, 0, ',', '.') }}₫</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Ngày đặt</span>
                        <span class="font-semibold text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-semibold mb-4">Tiến trình đơn hàng</h2>
                <div class="space-y-4 text-sm text-gray-700">
                    <div class="rounded-xl p-4 bg-indigo-50">
                        <p class="font-semibold">{{ $order->status_text }}</p>
                        <p class="text-gray-600">Chúng tôi sẽ cập nhật trạng thái đơn hàng khi có thay đổi.</p>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li>• 0: Đang xác nhận</li>
                        <li>• 1: Đang giao</li>
                        <li>• 2: Đang về</li>
                        <li>• 3: Đã giao</li>
                        <li>• 4: Đã hủy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
