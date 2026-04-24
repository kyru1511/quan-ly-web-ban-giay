<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view("reviews.create", compact("product"));
    }

    public function store(Request $request, $productId)
    {
        $validated = $request->validate([
            "customer_name" => "required|string|max:255",
            "rating" => "required|integer|min:1|max:5",
            "comment" => "required|string|min:10|max:1000",
        ]);

        Product::findOrFail($productId);
        
        Review::create([
            "product_id" => $productId,
            "customer_name" => $validated["customer_name"],
            "rating" => $validated["rating"],
            "comment" => $validated["comment"],
        ]);

        return redirect()->route("product.detail", $productId)->with("success", "Bình luận của bạn đã được gửi.");
    }

    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $reviews = $product->reviews()->latest()->paginate(10);
        
        return view("reviews.index", compact("product", "reviews"));
    }
}
