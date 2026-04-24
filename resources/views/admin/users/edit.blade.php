@extends('layouts.admin')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-8">
    <div class="flex items-center justify-between mb-6 border-b pb-4">
        <h3 class="text-2xl font-bold text-gray-800">Chỉnh sửa Tài khoản</h3>
        <a href="{{ route('admin.users.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">
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
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Họ tên <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                   class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Email <span class="text-red-500">*</span></label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                   class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-gray-700 font-semibold mb-2">Vai trò <span class="text-red-500">*</span></label>
            <select name="role" required class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500">
                <option value="">Chọn vai trò</option>
                <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Admin - Quản trị viên</option>
                <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Staff - Nhân viên</option>
                <option value="0" {{ old('role', $user->role) == 0 ? 'selected' : '' }}>Customer - Khách hàng</option>
            </select>
        </div>

        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <h4 class="font-semibold text-yellow-800 mb-2">Đổi mật khẩu (tùy chọn)</h4>
            <p class="text-yellow-700 text-sm mb-4">Để trống nếu không muốn đổi mật khẩu</p>

            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Mật khẩu mới</label>
                    <input type="password" name="password"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Xác nhận mật khẩu mới</label>
                    <input type="password" name="password_confirmation"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        <div class="flex space-x-4 pt-4">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition flex-1">
                <i class="fas fa-save mr-2"></i>Cập nhật tài khoản
            </button>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition">
                <i class="fas fa-times mr-2"></i>Hủy
            </a>
        </div>
    </form>
</div>
@endsection