@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-gray-800">Danh sách Sản phẩm</h3>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i>Thêm sản phẩm mới
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 border-b">
                    <th class="p-4 font-medium">ID</th>
                    <th class="p-4 font-medium">Hình ảnh</th>
                    <th class="p-4 font-medium">Tên sản phẩm</th>
                    <th class="p-4 font-medium">Danh mục</th>
                    <th class="p-4 font-medium">Giá bán</th>
                    <th class="p-4 font-medium text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-gray-500">#{{ $product->id }}</td>
                    <td class="p-4">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-16 h-16 rounded-lg object-cover shadow-sm">
                    </td>
                    <td class="p-4 font-bold text-gray-800">{{ $product->name }}</td>
                    <td class="p-4 text-gray-600">
                        <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $product->category ? $product->category->name : 'Chưa phân loại' }}
                        </span>
                    </td>
                    <td class="p-4 font-bold text-rose-600">{{ number_format($product->price, 0, ',', '.') }}₫</td>
                    <td class="p-4 text-center space-x-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 p-2"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('admin.products.destroy', $product->id) }}" class="text-red-500 hover:text-red-700 p-2" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection