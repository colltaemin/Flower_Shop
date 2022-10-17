<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name',
        'email',

        'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function orderFlowers()
    {
        return $this->hasManyThrough(OrderFlower::class, Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
