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
        $product = Product::with(['reviews', 'category'])->findOrFail($id);

        if (! $product->category || (!str_contains($product->category->slug, 'giay') && !str_contains($product->category->name, 'Giày'))) {
            abort(404);
        }
        
        // Tính điểm đánh giá trung bình
        $avgRating = $product->reviews->avg('rating') ?? 0;

        // Sản phẩm cùng thương hiệu, không bao gồm sản phẩm hiện tại
        $relatedProducts = Product::where('brand', $product->brand)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product_detail', compact('product', 'avgRating', 'relatedProducts'));
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