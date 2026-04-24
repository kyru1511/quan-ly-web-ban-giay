<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;

class ShopController extends Controller
{
    // 1. Hiển thị trang Chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm kèm theo danh sách bình luận của nó
        $product = Product::with('reviews')->findOrFail($id);
        
        // Tính điểm đánh giá trung bình
        $avgRating = $product->reviews->avg('rating') ?? 0;

        return view('product_detail', compact('product', 'avgRating'));
    }

    // 2. Lưu bình luận của khách
    public function postReview(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string'
        ]);

        Review::create([
            'product_id' => $id,
            'customer_name' => $request->customer_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã để lại đánh giá!');
    }
}