<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Logo mặc định (sẽ được thay thế khi upload)
        Setting::setValue('logo', '/storage/logos/default-logo.png', 'image');

        // Banner mặc định từ Unsplash (có thể thay thế bằng ảnh local)
        Setting::setValue('banner', 'https://images.unsplash.com/photo-1556906781-9a412961c28c?w=1200&q=80', 'image');
    }
}
