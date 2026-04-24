<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo tài khoản admin mặc định
        User::firstOrCreate(
            ['email' => 'admin@cloudyy.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'role' => 2, // Admin
            ]
        );

        // Tạo tài khoản staff mẫu
        User::firstOrCreate(
            ['email' => 'staff@cloudyy.com'],
            [
                'name' => 'Nhân viên A',
                'password' => Hash::make('staff123'),
                'role' => 1, // Staff
            ]
        );

        // Tạo tài khoản customer mẫu
        User::firstOrCreate(
            ['email' => 'customer@cloudyy.com'],
            [
                'name' => 'Khách hàng A',
                'password' => Hash::make('customer123'),
                'role' => 0, // Customer
            ]
        );
    }
}
