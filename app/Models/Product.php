<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'price', 'image', 'category_id', 'description'];

    // Khai báo: 1 Sản phẩm thuộc 1 Danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // Thêm đoạn này vào bên trong class Product
    public function reviews()
    {
        return $this->hasMany(Review::class)->latest(); // Lấy bình luận mới nhất lên đầu
    }
}