@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <h3 class="text-2xl font-bold text-gray-800">Chỉnh Sửa Sản Phẩm</h3>
        <a href="{{ route('admin.products.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
            <i class="fas fa-arrow-left mr-2"></i>Quay lại
        </a>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul class="list-disc list-inside font-medium">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Tên sản phẩm</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" placeholder="VD: Nike Air Max..." required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Danh mục</label>
                <select name="category_id" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500" required>
                    <option value="">-- Chọn danh mục --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Thương hiệu</label>
                <input type="text" name="brand" value="{{ $product->brand }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="VD: Nike, Adidas..." required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Giá bán (VNĐ)</label>
                <input type="number" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="VD: 1500000" required>
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Hình ảnh sản phẩm</label>

            @if($product->image)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Ảnh hiện tại:</p>
                    <img id="current-image" src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
                </div>
            @endif

            <input type="file" name="image" accept="image/*" id="image-input" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500 bg-gray-50" onchange="previewImage(event)">
            <p class="text-sm text-gray-500 mt-1">Để trống nếu không muốn thay đổi ảnh. Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB</p>

            <div id="image-preview" class="mt-4 hidden">
                <p class="text-sm text-gray-600 mb-2">Ảnh mới sẽ được upload:</p>
                <img id="preview-img" src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg border border-gray-300">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Mô tả chi tiết</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500" placeholder="Nhập mô tả sản phẩm vào đây..." required>{{ $product->description }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg">
                <i class="fas fa-save mr-2"></i>Cập Nhật Sản Phẩm
            </button>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    const currentImage = document.getElementById('current-image');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
            if (currentImage) {
                currentImage.style.opacity = '0.5';
            }
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
        if (currentImage) {
            currentImage.style.opacity = '1';
        }
    }
}
</script>
@endsection