<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;       // Khai báo Model Order
use App\Models\OrderItem;   // Khai báo Model OrderItem
use App\Models\Setting;     // Lấy cài đặt QR thanh toán

class CheckoutController extends Controller
{
    // Hiển thị trang thanh toán
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thanh toán.');
        }

        $cart = session()->get('cart', []);
        
        // Nếu giỏ hàng trống thì đuổi về trang chủ
        if (empty($cart)) {
            return redirect('/')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        $paymentQrBank = Setting::getValue('payment_qr_bank') ?? Setting::getValue('payment_qr');
        $paymentQrMomo = Setting::getValue('payment_qr_momo') ?? Setting::getValue('payment_qr');

        return view('checkout', compact('cart', 'paymentQrBank', 'paymentQrMomo'));
    }

    // Xử lý lưu đơn hàng
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/');
        }

        // 1. Kiểm tra dữ liệu nhập
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'payment_method' => 'required|in:cod,bank,momo,installment',
        ]);

        // 2. Tính tổng tiền
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // 3. Lưu vào bảng Orders
        $order = Order::create([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'notes' => $request->notes,
            'total_amount' => $totalAmount,
            'status' => 0, // Chờ xử lý
            'payment_method' => $request->payment_method,
        ]);

        // 4. Lưu chi tiết từng sản phẩm vào Order Items
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // 5. Xóa giỏ hàng sau khi đặt thành công
        session()->forget('cart');

        return redirect()->route('user.orders.index')->with('success', 'Đặt hàng thành công! Đơn hàng của bạn đang chờ xác nhận.');
    }
}