@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <h3 class="text-2xl font-bold text-gray-800">Chỉnh sửa Sản Phẩm</h3>
        <a href="{{ route('admin.products.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
            <i class="fas fa-arrow-left mr-2"></i>Quay lại
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Tên sản phẩm</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 shadow-sm" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Danh mục</label>
                <select name="category_id" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 shadow-sm" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Giá bán</label>
                <input type="number" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 shadow-sm" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Thương hiệu</label>
                <input type="text" name="brand" value="{{ $product->brand }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 shadow-sm" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Hình ảnh hiện tại</label>
            <img src="{{ $product->image }}" class="w-32 h-32 object-cover rounded-lg mb-2 shadow-md">
            <input type="file" name="image" class="w-full border border-gray-300 px-4 py-3 rounded-lg bg-gray-50">
            <p class="text-sm text-gray-500 mt-1 italic">* Để trống nếu không muốn thay đổi ảnh</p>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Mô tả</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-indigo-500 shadow-sm" required>{{ $product->description }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg">
                <i class="fas fa-sync-alt mr-2"></i>Cập nhật sản phẩm
            </button>
        </div>
    </form>
</div>
@endsection