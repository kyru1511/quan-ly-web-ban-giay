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
            'description' => 'Mẫu giày huyền thoại, phù hợp mọi phong cách.',
            'colors' => ['Trắng', 'Đen', 'Đỏ']
        ]);

        Product::create([
            'name' => 'Adidas Ultraboost 22',
            'brand' => 'Adidas',
            'price' => 3200000,
            'image' => 'https://images.unsplash.com/photo-1587563871167-1c9c372728d5?w=500&q=80',
            'category_id' => 1,
            'description' => 'Giày chạy bộ êm ái, thiết kế thể thao hiện đại.',
            'colors' => ['Trắng', 'Đen', 'Xanh Navy']
        ]);

        Product::create([
            'name' => 'Puma RS-X3',
            'brand' => 'Puma',
            'price' => 2800000,
            'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thiết kế retro với công nghệ hiện đại.',
            'colors' => ['Đen', 'Trắng', 'Hồng']
        ]);

        Product::create([
            'name' => 'New Balance 574',
            'brand' => 'New Balance',
            'price' => 2200000,
            'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?w=500&q=80',
            'category_id' => 1,
            'description' => 'Cổ điển và thoải mái cho mọi hoạt động.'
        ]);


        // Thêm nhiều giày thể thao hơn
        Product::create([
            'name' => 'Jordan 1 Retro High',
            'brand' => 'Nike',
            'price' => 4500000,
            'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500&q=80',
            'category_id' => 1,
            'description' => 'Biểu tượng của bóng rổ, thiết kế huyền thoại.',
            'colors' => ['Đỏ', 'Đen', 'Trắng']
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
            'description' => 'Cổ điển, bền bỉ và đậm chất đường phố.',
            'colors' => ['Đen', 'Trắng', 'Xanh']
        ]);
        
        Product::create([
            'name' => 'Converse Chuck Taylor All Star',
            'brand' => 'Converse',
            'price' => 1500000,
            'image' => 'https://images.unsplash.com/photo-1608231387042-66d1773070a5?w=500&q=80',
            'category_id' => 1,
            'description' => 'Biểu tượng của tuổi trẻ năng động.',
            'colors' => ['Trắng', 'Đen']
        ]);

        Product::create([
            'name' => 'Nike Air Zoom Pegasus 38',
            'brand' => 'Nike',
            'price' => 2900000,
            'image' => 'https://images.unsplash.com/photo-1552346154-af2ac39f7065?w=500&q=80',
            'category_id' => 1,
            'description' => 'Đệm êm, phù hợp chạy bộ và đi bộ hàng ngày.',
            'colors' => ['Đen', 'Xám', 'Xanh Dương']
        ]);

        Product::create([
            'name' => 'Adidas Samba Classic',
            'brand' => 'Adidas',
            'price' => 1800000,
            'image' => 'https://images.unsplash.com/photo-1528701800489-20f250e8a8ab?w=500&q=80',
            'category_id' => 1,
            'description' => 'Phong cách cổ điển, hợp mọi trang phục streetwear.',
            'colors' => ['Đen', 'Trắng', 'Xanh Lá']
        ]);

        Product::create([
            'name' => 'Puma Suede Classic',
            'brand' => 'Puma',
            'price' => 1700000,
            'image' => 'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?w=500&q=80',
            'category_id' => 1,
            'description' => 'Mềm mại, đẹp mắt và dễ phối đồ.',
            'colors' => ['Nâu', 'Đen']
        ]);

        Product::create([
            'name' => 'Richowen Urban Runner',
            'brand' => 'Richowen',
            'price' => 1990000,
            'image' => 'https://images.unsplash.com/photo-1528701800489-20f250e8a8ab?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thiết kế mạnh mẽ, giá dễ chịu cho phong cách đường phố.',
            'colors' => ['Đen', 'Xanh Đậm']
        ]);

        Product::create([
            'name' => 'Richowen Street Classic',
            'brand' => 'Richowen',
            'price' => 1750000,
            'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thoáng khí, độ bền cao, phù hợp đi làm và dạo phố.',
            'colors' => ['Xám', 'Đen']
        ]);

        Product::create([
            'name' => 'Nike Air Zoom Pegasus 38',
            'brand' => 'Nike',
            'price' => 2900000,
            'image' => 'https://images.unsplash.com/photo-1552346154-af2ac39f7065?w=500&q=80',
            'category_id' => 1,
            'description' => 'Đệm êm, phù hợp chạy bộ và đi bộ hàng ngày.'
        ]);

        Product::create([
            'name' => 'Adidas Samba Classic',
            'brand' => 'Adidas',
            'price' => 1800000,
            'image' => 'https://images.unsplash.com/photo-1528701800489-20f250e8a8ab?w=500&q=80',
            'category_id' => 1,
            'description' => 'Phong cách cổ điển, hợp mọi trang phục streetwear.'
        ]);

        Product::create([
            'name' => 'Puma Suede Classic',
            'brand' => 'Puma',
            'price' => 1700000,
            'image' => 'https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?w=500&q=80',
            'category_id' => 1,
            'description' => 'Mềm mại, đẹp mắt và dễ phối đồ.'
        ]);

        Product::create([
            'name' => 'Richowen Urban Runner',
            'brand' => 'Richowen',
            'price' => 1990000,
            'image' => 'https://images.unsplash.com/photo-1528701800489-20f250e8a8ab?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thiết kế mạnh mẽ, giá dễ chịu cho phong cách đường phố.'
        ]);

        Product::create([
            'name' => 'Richowen Street Classic',
            'brand' => 'Richowen',
            'price' => 1750000,
            'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500&q=80',
            'category_id' => 1,
            'description' => 'Thoáng khí, độ bền cao, phù hợp đi làm và dạo phố.'
        ]);
    }
}
