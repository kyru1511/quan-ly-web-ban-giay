<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Hiển thị trang giỏ hàng
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // 2. Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để mua hàng.');
        }

        $product = Product::findOrFail($id);
        $color = $request->query('color');
        if ($color && $product->colors && !in_array($color, $product->colors)) {
            $color = null;
        }

        $cart = session()->get('cart', []);
        $cartKey = $id . ($color ? '|' . $color : '');

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
        } else {
            $cart[$cartKey] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->image,
                'color' => $color,
            ];
        }

        session()->put('cart', $cart);
        $message = 'Đã thêm ' . $product->name;
        if ($color) {
            $message .= ' (' . $color . ')';
        }
        $message .= ' vào giỏ hàng!';

        return redirect()->back()->with('success', $message);
    }

    // 3. Xóa sản phẩm khỏi giỏ
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }
}