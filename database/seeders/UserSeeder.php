<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Bắt buộc phải có
use Illuminate\Support\Facades\Hash; // Để mã hóa mật khẩu

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Chủ Shop Cloudyy',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'), // Mật khẩu là 123456
            'role' => 2, // Admin
        ]);

        // Nhân viên
        User::create([
            'name' => 'Nhân Viên A',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 1, // Nhân viên
        ]);

        // Khách hàng
        User::create([
            'name' => 'Khách Hàng B',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 0, // Khách hàng
        ]);

        // Thêm một số khách hàng mẫu khác
        User::create([
            'name' => 'Nguyễn Văn A',
            'email' => 'nguyenvana@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 0,
        ]);

        User::create([
            'name' => 'Trần Thị B',
            'email' => 'tranthib@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 0,
        ]);
    }
}