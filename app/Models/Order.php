<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'customer_id',
        'name',
        'address',
        'district',
        'province',
        'phone',
        'note',
        'message',
        'shipped_at',
        'paid_at',
        'status',
        'total',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function orderFlowers()
    {
        return $this->hasMany(OrderFlower::class, 'order_id');
    }
}
