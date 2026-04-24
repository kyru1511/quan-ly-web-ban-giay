@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800">Chi tiết Đơn hàng #{{ $order->id }}</h3>
        <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
            <i class="fas fa-arrow-left mr-2"></i>Quay lại danh sách
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h4 class="font-bold text-lg border-b pb-3 mb-4">Thông tin người nhận</h4>
                <div class="space-y-3 text-gray-600">
                    <p><i class="fas fa-user w-6 text-gray-400"></i> <strong class="text-gray-800">{{ $order->customer_name }}</strong></p>
                    <p><i class="fas fa-phone w-6 text-gray-400"></i> {{ $order->customer_phone }}</p>
                    <p><i class="fas fa-map-marker-alt w-6 text-gray-400"></i> {{ $order->customer_address }}</p>
                    <p><i class="fas fa-credit-card w-6 text-gray-400"></i> 
                        <strong class="text-gray-800">
                            @switch($order->payment_method)
                                @case('cod')
                                    Thanh toán khi nhận hàng
                                    @break
                                @case('bank')
                                    Chuyển khoản ngân hàng
                                    @break
                                @case('momo')
                                    Ví điện tử MoMo
                                    @break
                                @case('installment')
                                    Thanh toán trả sau
                                    @break
                                @default
                                    {{ $order->payment_method }}
                            @endswitch
                        </strong>
                    </p>
                    @if($order->notes)
                        <p><i class="fas fa-comment w-6 text-gray-400"></i> Ghi chú: <span class="italic">{{ $order->notes }}</span></p>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6">
                <h4 class="font-bold text-lg border-b pb-3 mb-4">Cập nhật Trạng thái</h4>
                <form action="{{ route('admin.orders.update_status', $order->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <select name="status" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 font-semibold">
                        <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Chờ xử lý</option>
                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Đang giao hàng</option>
                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Hoàn thành (Đã giao)</option>
                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Hủy đơn</option>
                    </select>
                    <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-lg font-bold hover:bg-indigo-600 transition">
                        Cập nhật
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
            <h4 class="font-bold text-lg border-b pb-3 mb-4">Sản phẩm đã đặt</h4>
            <div class="space-y-4">
                @foreach($order->items as $item)
                    <div class="flex items-center justify-between border-b pb-4 last:border-0 last:pb-0">
                        <div class="flex items-center gap-4">
                            <img src="{{ $item->product ? $item->product->image : 'https://via.placeholder.com/150' }}" class="w-20 h-20 rounded-lg object-cover">
                            <div>
                                <h5 class="font-bold text-gray-800 text-lg">{{ $item->product ? $item->product->name : 'Sản phẩm đã bị xóa' }}</h5>
                                <p class="text-gray-500">{{ number_format($item->price, 0, ',', '.') }}₫ x {{ $item->quantity }}</p>
                            </div>
                        </div>
                        <div class="font-bold text-rose-600 text-lg">
                            {{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-6 border-t border-dashed flex justify-between items-center text-xl">
                <span class="font-bold text-gray-600">Tổng thanh toán:</span>
                <span class="font-extrabold text-rose-600 text-2xl">{{ number_format($order->total_amount, 0, ',', '.') }}₫</span>
            </div>
        </div>
    </div>
</div>
@endsection