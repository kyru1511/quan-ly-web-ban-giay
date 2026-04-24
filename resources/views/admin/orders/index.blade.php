@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="text-xl font-bold text-gray-800 mb-6">Danh sách Đơn hàng</h3>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 border-b">
                    <th class="p-4 font-medium">Mã ĐH</th>
                    <th class="p-4 font-medium">Khách hàng</th>
                    <th class="p-4 font-medium">Số điện thoại</th>
                    <th class="p-4 font-medium">Thanh toán</th>
                    <th class="p-4 font-medium">Tổng tiền</th>
                    <th class="p-4 font-medium">Trạng thái</th>
                    <th class="p-4 font-medium text-center">Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-gray-500">#{{ $order->id }}</td>
                    <td class="p-4 font-bold text-gray-800">{{ $order->customer_name }}</td>
                    <td class="p-4 text-gray-600">{{ $order->customer_phone }}</td>
                    <td class="p-4">
                        @switch($order->payment_method)
                            @case('cod')
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs font-semibold">COD</span>
                                @break
                            @case('bank')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">Ngân hàng</span>
                                @break
                            @case('momo')
                                <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded text-xs font-semibold">MoMo</span>
                                @break
                            @case('installment')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Trả sau</span>
                                @break
                            @default
                                <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs font-semibold">{{ $order->payment_method }}</span>
                        @endswitch
                    </td>
                    <td class="p-4 font-bold text-rose-600">{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                    <td class="p-4">
                        @if($order->status == 0)
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Chờ xử lý</span>
                        @elseif($order->status == 1)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Đang giao</span>
                        @elseif($order->status == 2)
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Đã giao</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Đã hủy</span>
                        @endif
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg font-semibold hover:bg-indigo-600 hover:text-white transition">
                            Xem
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection