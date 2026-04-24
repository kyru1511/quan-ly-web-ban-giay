<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Giày thể thao (category_id = 1)
        Product::create([
            'name' => 'Nike Air Force 1',
            'brand' => 'Nike',
            'price' => 2500000,
            'image' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500&q=80',
            'category_id' => 1,
            'description' => 'Mẫu giày huyền thoại, phù hợp mọi phong cách.'
        ]);

        Product::create([
            'name' => 'Adidas Ultraboost 22',
            'brand' => 'Adidas',
            'price' => 3200000,
            'image' => 'https://images.unsplash.com/photo-1587563871167-1c9c372728d5?w=500&q=80',
            'category_id' => 1,
            'description' => 'Giày chạy bộ êm ái, thiết kế thể thao hiện đại.'
        ]);

        Product::create([
            'name' => 'Puma RS-X3',
            'brand' => 'Puma',
            'price' => 2800000,
            'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thiết kế retro với công nghệ hiện đại.'
        ]);

        Product::create([
            'name' => 'New Balance 574',
            'brand' => 'New Balance',
            'price' => 2200000,
            'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=500&q=80',
            'category_id' => 1,
            'description' => 'Cổ điển và thoải mái cho mọi hoạt động.'
        ]);

        // Dép (category_id = 2)
        Product::create([
            'name' => 'Dép Crocs Classic',
            'brand' => 'Crocs',
            'price' => 800000,
            'image' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&q=80',
            'category_id' => 2,
            'description' => 'Dép thoải mái, dễ chịu cho mọi ngày.'
        ]);

        Product::create([
            'name' => 'Dép Biti\'s Hunter',
            'brand' => 'Biti\'s',
            'price' => 600000,
            'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&q=80',
            'category_id' => 2,
            'description' => 'Dép nam thời trang, chất liệu cao cấp.'
        ]);

        // Túi xách (category_id = 3)
        Product::create([
            'name' => 'Túi Đeo Chéo Gucci',
            'brand' => 'Gucci',
            'price' => 15000000,
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500&q=80',
            'category_id' => 3,
            'description' => 'Túi xách cao cấp, phong cách sang trọng.'
        ]);

        Product::create([
            'name' => 'Túi Xách LV Neverfull',
            'brand' => 'Louis Vuitton',
            'price' => 25000000,
            'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=500&q=80',
            'category_id' => 3,
            'description' => 'Biểu tượng của sự tinh tế và đẳng cấp.'
        ]);

        // Phụ kiện (category_id = 4)
        Product::create([
            'name' => 'Ví Da Nam',
            'brand' => 'Local Brand',
            'price' => 500000,
            'image' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=500&q=80',
            'category_id' => 4,
            'description' => 'Ví da thật, thiết kế đơn giản và tinh tế.'
        ]);

        Product::create([
            'name' => 'Thắt Lưng Da',
            'brand' => 'Local Brand',
            'price' => 700000,
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=500&q=80',
            'category_id' => 4,
            'description' => 'Thắt lưng da cao cấp, phù hợp mọi trang phục.'
        ]);

        // Thêm nhiều giày thể thao hơn
        Product::create([
            'name' => 'Jordan 1 Retro High',
            'brand' => 'Nike',
            'price' => 4500000,
            'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500&q=80',
            'category_id' => 1,
            'description' => 'Biểu tượng của bóng rổ, thiết kế huyền thoại.'
        ]);

        Product::create([
            'name' => 'Yeezy Boost 350 V2',
            'brand' => 'Adidas',
            'price' => 8000000,
            'image' => 'https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thiết kế tiên tiến, công nghệ đỉnh cao.'
        ]);

        Product::create([
            'name' => 'Vans Old Skool',
            'brand' => 'Vans',
            'price' => 1200000,
            'image' => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=500&q=80',
            'category_id' => 1,
            'description' => 'Cổ điển, bền bỉ và đậm chất đường phố.'
        ]);
        
        Product::create([
            'name' => 'Converse Chuck Taylor All Star',
            'brand' => 'Converse',
            'price' => 1500000,
            'image' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&q=80',
            'category_id' => 1,
            'description' => 'Biểu tượng của tuổi trẻ năng động.'
        ]);

        // Thêm dép nữa
        Product::create([
            'name' => 'Dép Lê Nam',
            'brand' => 'Local',
            'price' => 400000,
            'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=500&q=80',
            'category_id' => 2,
            'description' => 'Dép lê nam da thật, phong cách lịch lãm.'
        ]);

        // Thêm túi
        Product::create([
            'name' => 'Túi Xách Nữ',
            'brand' => 'Local',
            'price' => 1200000,
            'image' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=500&q=80',
            'category_id' => 3,
            'description' => 'Túi xách nữ thời trang, nhiều ngăn tiện lợi.'
        ]);
    }
}