<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Hi?n th? danh s�ch t?t c? reviews
    public function index()
    {
        $reviews = Review::with("product")->latest()->paginate(20);
        return view("admin.reviews.index", compact("reviews"));
    }

    // X�a review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route("admin.reviews.index")->with("success", "Bình luận đã được xóa.");
    }

    // Ch?nh s?a review
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view("admin.reviews.edit", compact("review"));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        
        $validated = $request->validate([
            "customer_name" => "required|string|max:255",
            "rating" => "required|integer|min:1|max:5",
            "comment" => "required|string|min:10",
        ]);

        $review->update($validated);
        
        return redirect()->route("admin.reviews.index")->with("success", "Bình luận đã được cập nhật.");
    }
}
