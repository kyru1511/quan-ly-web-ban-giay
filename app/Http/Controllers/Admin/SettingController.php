<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Hiển thị form cài đặt
     */
    public function index()
    {
        $logo = Setting::getValue('logo');
        $banner = Setting::getValue('banner');

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

        return view('admin.settings.index', compact('logo', 'banner', 'hero', 'slides'));
    }

    /**
     * Cập nhật logo
     */
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240', // Max 10MB, hỗ trợ GIF và WebP
        ]);

        if ($request->hasFile('logo')) {
            // Xóa logo cũ nếu tồn tại
            $oldLogo = Setting::getValue('logo');
            if ($oldLogo && !str_contains($oldLogo, 'http')) {
                $oldLogoPath = str_replace('/storage/', '', $oldLogo);
                Storage::disk('public')->delete($oldLogoPath);
            }

            // Upload logo mới
            $logoPath = $request->file('logo')->store('logos', 'public');
            Setting::setValue('logo', '/storage/' . $logoPath);

            return redirect()->back()->with('success', 'Logo đã được cập nhật thành công!');
        }

        return redirect()->back()->with('error', 'Không thể upload logo!');
    }

    /**
     * Cập nhật banner
     */
    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:15360', // Max 15MB, hỗ trợ GIF và WebP
        ]);

        if ($request->hasFile('banner')) {
            // Xóa banner cũ nếu tồn tại và không phải URL external
            $oldBanner = Setting::getValue('banner');
            if ($oldBanner && !str_contains($oldBanner, 'http')) {
                $oldBannerPath = str_replace('/storage/', '', $oldBanner);
                Storage::disk('public')->delete($oldBannerPath);
            }

            // Upload banner mới
            $bannerPath = $request->file('banner')->store('banners', 'public');
            Setting::setValue('banner', '/storage/' . $bannerPath);

            return redirect()->back()->with('success', 'Banner đã được cập nhật thành công!');
        }

        return redirect()->back()->with('error', 'Không thể upload banner!');
    }

    /**
     * Cập nhật cả logo và banner cùng lúc
     */
    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'hero_promo_text' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_highlight' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:500',
            'hero_cta_text' => 'nullable|string|max:100',
            'hero_cta_link' => 'nullable|string|max:255',
            'slides' => 'nullable|array|max:3',
            'slides.*.category' => 'nullable|string|max:100',
            'slides.*.badge' => 'nullable|string|max:100',
            'slides.*.title' => 'nullable|string|max:255',
            'slides.*.subtitle' => 'nullable|string|max:255',
            'slides.*.price_label' => 'nullable|string|max:100',
            'slides.*.price_value' => 'nullable|string|max:100',
            'slides.*.icon_class' => 'nullable|string|max:100',
        ]);

        // Cập nhật logo
        if ($request->hasFile('logo')) {
            $oldLogo = Setting::getValue('logo');
            if ($oldLogo && !str_contains($oldLogo, 'http')) {
                $oldLogoPath = str_replace('/storage/', '', $oldLogo);
                Storage::disk('public')->delete($oldLogoPath);
            }

            $logoPath = $request->file('logo')->store('logos', 'public');
            Setting::setValue('logo', '/storage/' . $logoPath);
        }

        // Cập nhật banner
        if ($request->hasFile('banner')) {
            $oldBanner = Setting::getValue('banner');
            if ($oldBanner && !str_contains($oldBanner, 'http')) {
                $oldBannerPath = str_replace('/storage/', '', $oldBanner);
                Storage::disk('public')->delete($oldBannerPath);
            }

            $bannerPath = $request->file('banner')->store('banners', 'public');
            Setting::setValue('banner', '/storage/' . $bannerPath);
        }

        // Cập nhật hero nếu người dùng gửi dữ liệu hero
        if ($request->hasAny(['hero_promo_text', 'hero_title', 'hero_highlight', 'hero_subtitle', 'hero_cta_text', 'hero_cta_link'])) {
            $hero = json_decode(Setting::getValue('home_hero'), true) ?? [
                'promo_text' => '🚀 Khuyến mãi đặc biệt - Giảm 30%',
                'title' => 'Khám Phá Bộ Sưu Tập',
                'highlight' => 'Giày Sneaker',
                'subtitle' => 'Chất lượng cao cấp, thiết kế thời trang và giá cả cạnh tranh. Cloudyy mang phong cách đến với mọi bước chân của bạn.',
                'cta_text' => 'Mua Ngay',
                'cta_link' => '#products',
            ];

            $hero['promo_text'] = $request->input('hero_promo_text', $hero['promo_text']);
            $hero['title'] = $request->input('hero_title', $hero['title']);
            $hero['highlight'] = $request->input('hero_highlight', $hero['highlight']);
            $hero['subtitle'] = $request->input('hero_subtitle', $hero['subtitle']);
            $hero['cta_text'] = $request->input('hero_cta_text', $hero['cta_text']);
            $hero['cta_link'] = $request->input('hero_cta_link', $hero['cta_link']);

            Setting::setValue('home_hero', json_encode($hero), 'json');
        }

        // Cập nhật slide nếu gửi dữ liệu slide
        if ($request->has('slides')) {
            $slides = [];
            $slideInputs = $request->input('slides', []);
            foreach ($slideInputs as $slideInput) {
                $slides[] = [
                    'category' => $slideInput['category'] ?? '',
                    'badge' => $slideInput['badge'] ?? '',
                    'title' => $slideInput['title'] ?? '',
                    'subtitle' => $slideInput['subtitle'] ?? '',
                    'price_label' => $slideInput['price_label'] ?? '',
                    'price_value' => $slideInput['price_value'] ?? '',
                    'icon_class' => $slideInput['icon_class'] ?? '',
                ];
            }

            Setting::setValue('home_slides', json_encode($slides), 'json');
        }

        return redirect()->back()->with('success', 'Cài đặt đã được cập nhật thành công!');
    }
}
