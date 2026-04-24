<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;   // Thêm dòng này
use App\Models\Category;  // Thêm dòng này
use App\Models\Setting;   // Thêm dòng này

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Tìm kiếm theo tên
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Lọc theo loại (Giày, Dép, Túi...)
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->get();
        $categories = Category::all(); // Lấy các loại để hiển thị menu
        $logo = Setting::getValue('logo');
        $banner = Setting::getValue('banner', 'https://images.unsplash.com/photo-1556906781-9a412961c28c?w=1200&q=80');

        $hero = json_decode(Setting::getValue('home_hero'), true) ?? [
            'promo_text' => '🚀 Khuyến mãi đặc biệt - Giảm 30%',
            'title' => 'Khám Phá Bộ Sưu Tập',
            'highlight' => 'Giày Sneaker',
            'subtitle' => 'Chất lượng cao cấp, thiết kế thời trang và giá cả cạnh tranh. Cloudyy mang phong cách đến với mọi bước chân của bạn.',
            'cta_text' => 'Mua Ngay',
            'cta_link' => '#products',
        ];

        $slides = json_decode(Setting::getValue('home_slides'), true) ?? [
            [
                'category' => 'Sneaker',
                'badge' => 'Giảm 20%',
                'title' => 'Nike Air Max',
                'subtitle' => 'Thiết kế trẻ trung, đi học đi chơi đều sang.',
                'price_label' => 'Giá chỉ',
                'price_value' => '2.490.000₫',
                'icon_class' => 'fas fa-shoe-prints',
            ],
            [
                'category' => 'Thể thao',
                'badge' => 'Mới',
                'title' => 'Adidas Runner',
                'subtitle' => 'Êm nhẹ, thoáng khí, phù hợp mọi hoạt động.',
                'price_label' => 'Giá chỉ',
                'price_value' => '1.890.000₫',
                'icon_class' => 'fas fa-running',
            ],
            [
                'category' => 'Lifestyle',
                'badge' => 'Best seller',
                'title' => 'Vans Classic',
                'subtitle' => 'Phong cách streetwear, dễ phối đồ hàng ngày.',
                'price_label' => 'Giá chỉ',
                'price_value' => '1.290.000₫',
                'icon_class' => 'fas fa-heart',
            ],
        ];

        return view('home', compact('products', 'categories', 'logo', 'banner', 'hero', 'slides'));
    }
}