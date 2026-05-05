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
        ];

        foreach($categories as $cat) {
            \App\Models\Category::create($cat);
        }
    }
}

