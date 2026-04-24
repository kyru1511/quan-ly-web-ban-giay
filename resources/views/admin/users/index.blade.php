@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-gray-800">Quản lý Tài khoản</h3>
        <a href="{{ route('admin.users.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i>Thêm tài khoản mới
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded-lg mb-4 font-semibold">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 border-b">
                    <th class="p-4 font-medium">ID</th>
                    <th class="p-4 font-medium">Tên</th>
                    <th class="p-4 font-medium">Email</th>
                    <th class="p-4 font-medium">Vai trò</th>
                    <th class="p-4 font-medium">Ngày tạo</th>
                    <th class="p-4 font-medium text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="p-4 font-bold text-gray-500">#{{ $user->id }}</td>
                    <td class="p-4 font-bold text-gray-800">{{ $user->name }}</td>
                    <td class="p-4 text-gray-600">{{ $user->email }}</td>
                    <td class="p-4">
                        @if($user->role == 2)
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-bold">Admin</span>
                        @elseif($user->role == 1)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-bold">Nhân viên</span>
                        @else
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">Khách hàng</span>
                        @endif
                    </td>
                    <td class="p-4 text-gray-600">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="p-4 text-center space-x-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700 p-2" title="Chỉnh sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        @if($user->id !== auth()->id())
                            <a href="{{ route('admin.users.destroy', $user->id) }}" class="text-red-500 hover:text-red-700 p-2" title="Xóa"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa tài khoản này?')">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        @else
                            <span class="text-gray-400 p-2" title="Không thể xóa tài khoản đang đăng nhập">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($users->isEmpty())
        <div class="text-center py-12">
            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Chưa có tài khoản nào</p>
            <a href="{{ route('admin.users.create') }}" class="text-indigo-600 hover:underline mt-2 inline-block">Tạo tài khoản đầu tiên</a>
        </div>
    @endif
</div>
@endsection