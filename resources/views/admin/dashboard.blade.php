@extends('layouts.admin')

@section('content')
<div>
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Tổng quan hệ thống</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-indigo-100 mb-1 font-medium">Tổng Doanh Thu</p>
                    <h3 class="text-3xl font-bold">{{ number_format($totalRevenue, 0, ',', '.') }}₫</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <i class="fas fa-wallet text-2xl"></i>
                </div>
            </div>
            <p class="text-sm mt-4 text-indigo-100">* Chỉ tính các đơn đã giao thành công</p>
        </div>

        <div class="bg-gradient-to-r from-emerald-400 to-teal-500 rounded-xl p-6 text-white shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-emerald-100 mb-1 font-medium">Tổng Đơn Hàng</p>
                    <h3 class="text-3xl font-bold">{{ $totalOrders }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <i class="fas fa-shopping-bag text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="text-sm mt-4 inline-block text-emerald-50 hover:text-white underline">Xem quản lý đơn hàng &rarr;</a>
        </div>

        <div class="bg-gradient-to-r from-rose-400 to-red-500 rounded-xl p-6 text-white shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-rose-100 mb-1 font-medium">Tổng Sản Phẩm</p>
                    <h3 class="text-3xl font-bold">{{ $totalProducts }}</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <i class="fas fa-shoe-prints text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-sm mt-4 inline-block text-rose-50 hover:text-white underline">Xem kho hàng &rarr;</a>
        </div>

        <div class="bg-gradient-to-r from-cyan-400 to-blue-500 rounded-xl p-6 text-white shadow-lg">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-cyan-100 mb-1 font-medium">Cài Đặt Website</p>
                    <h3 class="text-3xl font-bold">Logo & Banner</h3>
                </div>
                <div class="bg-white/20 p-3 rounded-lg">
                    <i class="fas fa-cog text-2xl"></i>
                </div>
            </div>
            <a href="{{ route('admin.settings.index') }}" class="text-sm mt-4 inline-block text-cyan-50 hover:text-white underline">Quản lý logo & banner &rarr;</a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">5 Đơn hàng mới nhất</h3>
            <a href="{{ route('admin.orders.index') }}" class="text-indigo-600 hover:underline text-sm font-semibold">Xem tất cả</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 border-b">
                        <th class="p-4 font-medium">Mã ĐH</th>
                        <th class="p-4 font-medium">Khách hàng</th>
                        <th class="p-4 font-medium">Tổng tiền</th>
                        <th class="p-4 font-medium">Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="p-4 font-bold text-gray-500">#{{ $order->id }}</td>
                        <td class="p-4 font-bold text-gray-800">{{ $order->customer_name }}</td>
                        <td class="p-4 font-bold text-rose-600">{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                        <td class="p-4">
                            @if($order->status == 0)
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Chờ xử lý</span>
                            @elseif($order->status == 1)
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Đang giao</span>
                            @elseif($order->status == 2)
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Đã giao</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Đã hủy</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection