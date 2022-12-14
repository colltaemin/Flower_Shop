<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
            ->withTimestamps()
        ;
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'id', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function scopeSearch($query)
    {
        if (request()->search) {
            $query = $query->where('name', 'like', '%'.request()->search.'%');
        }

        return $query;
    }
}
