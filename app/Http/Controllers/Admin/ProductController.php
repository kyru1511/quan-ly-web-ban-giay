<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 1. Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::with('category')
            ->whereHas('category', function($q) {
                $q->shoe();
            })
            ->latest()
            ->get();

        return view('admin.products.index', compact('products'));
    }

    // 2. Hiển thị Form thêm sản phẩm
    public function create()
    {
        $categories = Category::shoe()->get(); 
        return view('admin.products.create', compact('categories'));
    }

    // 3. Xử lý lưu sản phẩm mới vào Database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('name', 'like', '%Giày%')
                          ->orWhere('slug', 'like', 'giay%');
                }),
            ],
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required',
            'colors' => 'nullable|string|max:255',
        ]);

        $imagePath = '';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $colors = array_values(array_filter(array_map('trim', explode(',', $request->input('colors', '')))));

        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'brand' => $request->brand,
            'price' => $request->price,
            'image' => '/storage/' . $imagePath,
            'description' => $request->description,
            'colors' => $colors,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    // 4. Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::shoe()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // 5. Cập nhật dữ liệu sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('name', 'like', '%Giày%')
                          ->orWhere('slug', 'like', 'giay%');
                }),
            ],
            'brand' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'colors' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['name', 'category_id', 'brand', 'price', 'description']);
        $data['colors'] = array_values(array_filter(array_map('trim', explode(',', $request->input('colors', '')))));

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($product->image) {
                $oldImagePath = str_replace('/storage/', '', $product->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = '/storage/' . $imagePath;
        } else {
            $data['image'] = $product->image;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 6. Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh nếu tồn tại
        if ($product->image) {
            $imagePath = str_replace('/storage/', '', $product->image);
            Storage::disk('public')->delete($imagePath);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Đã xóa sản phẩm thành công!');
    }

    // 7. Hiển thị chi tiết sản phẩm (dùng cho người mua hàng)
    public function show($id)
    {
        $product = Product::with(['reviews', 'category'])->findOrFail($id);

        if (! $product->category || (!str_contains($product->category->slug, 'giay') && !str_contains($product->category->name, 'Giày'))) {
            abort(404);
        }

        $avgRating = $product->reviews->avg('rating') ?: 0;

        $relatedProducts = Product::where('brand', $product->brand)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product_detail', compact('product', 'avgRating', 'relatedProducts'));
    }
}