<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $categories = [
        ['name' => 'Giày thể thao', 'slug' => 'giay-the-thao'],
        ['name' => 'Dép nam nữ', 'slug' => 'dep'],
        ['name' => 'Túi xách thời trang', 'slug' => 'tui-xach'],
        ['name' => 'Ví & Thắt lưng', 'slug' => 'phu-kien']
    ];
    foreach($categories as $cat) {
        \App\Models\Category::create($cat);
    }
}
}
