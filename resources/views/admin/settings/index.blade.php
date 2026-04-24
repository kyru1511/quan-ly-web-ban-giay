@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <h3 class="text-2xl font-bold text-gray-800">Cài đặt Website</h3>
        <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
            <i class="fas fa-arrow-left mr-2"></i>Quay lại Dashboard
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

    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Logo Section -->
        <div class="bg-gray-50 rounded-lg p-6">
            <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-image mr-2 text-indigo-600"></i>Logo Website
            </h4>

            @if($logo)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Logo hiện tại:</p>
                    <img id="current-logo" src="{{ asset($logo) }}" alt="Logo" class="w-32 h-32 object-contain rounded-lg border border-gray-300 bg-white">
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Upload Logo mới</label>
                    <input type="file" name="logo" accept="image/*" id="logo-input" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500 bg-white" onchange="previewLogo(event)">
                    <p class="text-sm text-gray-500 mt-1">Định dạng: JPG, PNG, GIF, SVG, WebP. Kích thước tối đa: 10MB. Khuyến nghị: 200x200px</p>
                </div>

                <div id="logo-preview" class="mb-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">Logo mới sẽ được upload:</p>
                    <img id="preview-logo" src="" alt="Preview Logo" class="w-32 h-32 object-contain rounded-lg border border-gray-300 bg-white">
                </div>

                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                    <i class="fas fa-save mr-2"></i>Cập nhật Logo
                </button>
            </form>
        </div>

        <!-- Banner Section -->
        <div class="bg-gray-50 rounded-lg p-6">
            <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <i class="fas fa-images mr-2 text-green-600"></i>Banner Trang chủ
            </h4>

            @if($banner)
                <div class="mb-4">
                    <p class="text-sm text-gray-600 mb-2">Banner hiện tại:</p>
                    <img id="current-banner" src="{{ asset($banner) }}" alt="Banner" class="w-full h-32 object-cover rounded-lg border border-gray-300">
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Upload Banner mới</label>
                    <input type="file" name="banner" accept="image/*" id="banner-input" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-green-500 bg-white" onchange="previewBanner(event)">
                    <p class="text-sm text-gray-500 mt-1">Định dạng: JPG, PNG, GIF, WebP. Kích thước tối đa: 15MB. Khuyến nghị: 1200x400px</p>
                </div>

                <div id="banner-preview" class="mb-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">Banner mới sẽ được upload:</p>
                    <img id="preview-banner" src="" alt="Preview Banner" class="w-full h-32 object-cover rounded-lg border border-gray-300">
                </div>

                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                    <i class="fas fa-save mr-2"></i>Cập nhật Banner
                </button>
            </form>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mt-8 bg-blue-50 rounded-lg p-6">
        <h4 class="text-lg font-bold text-blue-800 mb-4">💡 Mẹo sử dụng:</h4>
        <ul class="text-blue-700 text-sm space-y-2">
            <li>• <strong>Logo:</strong> Nên dùng ảnh PNG/WebP trong suốt, kích thước vuông (200x200px)</li>
            <li>• <strong>Banner:</strong> Ảnh ngang, chất lượng cao. Hỗ trợ GIF động để thu hút khách hàng</li>
            <li>• <strong>Định dạng:</strong> JPG/PNG cho ảnh tĩnh, GIF/WebP cho ảnh động</li>
            <li>• <strong>Kích thước:</strong> Logo tối đa 10MB, Banner tối đa 15MB</li>
            <li>• <strong>AI Chatbot:</strong> Khách hàng có thể chat với AI tại <a href="/chat" class="underline hover:text-blue-900">/chat</a></li>
        </ul>
    </div>
</div>

<script>
function previewLogo(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('logo-preview');
    const previewImg = document.getElementById('preview-logo');
    const currentLogo = document.getElementById('current-logo');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
            if (currentLogo) {
                currentLogo.style.opacity = '0.5';
            }
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
        if (currentLogo) {
            currentLogo.style.opacity = '1';
        }
    }
}

function previewBanner(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('banner-preview');
    const previewImg = document.getElementById('preview-banner');
    const currentBanner = document.getElementById('current-banner');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
            if (currentBanner) {
                currentBanner.style.opacity = '0.5';
            }
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
        if (currentBanner) {
            currentBanner.style.opacity = '1';
        }
    }
}
</script>
@endsection