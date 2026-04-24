<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Thống kê dữ liệu
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        
        // Tính tổng doanh thu (Chỉ tính những đơn hàng đã giao thành công - status = 2)
        $totalRevenue = Order::where('status', 2)->sum('total_amount');

        // Lấy 5 đơn hàng mới nhất để hiển thị nhanh
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'totalRevenue', 'recentOrders'));
    }
}