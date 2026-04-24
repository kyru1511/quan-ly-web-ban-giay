<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order; // Khai báo Model Order

class OrderController extends Controller
{
    // 1. Hiển thị danh sách tất cả đơn hàng
    public function index()
    {
        // Lấy đơn hàng mới nhất xếp lên đầu
        $orders = Order::latest()->get(); 
        return view('admin.orders.index', compact('orders'));
    }

    // 2. Xem chi tiết 1 đơn hàng
    public function show($id)
    {
        // Lấy đơn hàng kèm theo chi tiết sản phẩm (Mối quan hệ items.product)
        $order = Order::with('items.product')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // 3. Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng!');
    }
}