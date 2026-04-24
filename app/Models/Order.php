<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'customer_name', 'customer_phone', 'customer_address', 'notes', 'total_amount', 'status', 'payment_method'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function statusText($status)
    {
        return [
            0 => 'Đang xác nhận',
            1 => 'Đang giao',
            2 => 'Đang về',
            3 => 'Đã giao',
            4 => 'Đã hủy',
        ][$status] ?? 'Không xác định';
    }

    public function getStatusTextAttribute()
    {
        return self::statusText($this->status);
    }

    public function getStatusBadgeClassAttribute()
    {
        return match ($this->status) {
            0 => 'bg-yellow-100 text-yellow-700',
            1 => 'bg-blue-100 text-blue-700',
            2 => 'bg-indigo-100 text-indigo-700',
            3 => 'bg-green-100 text-green-700',
            4 => 'bg-red-100 text-red-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }
}