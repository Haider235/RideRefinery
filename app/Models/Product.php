<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const TYPE_PRODUCT   = 'product';
    public const TYPE_SPAREPART = 'spare_part'; // use underscore to avoid typos

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'status',       // keeping your existing status usage
        'image',
        'product_type', // NEW
    ];

    // --- Relationships ---
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // --- Scopes ---
    public function scopeProducts($q)
    {
        return $q->where('product_type', self::TYPE_PRODUCT);
    }

    public function scopeSpareParts($q)
    {
        return $q->where('product_type', self::TYPE_SPAREPART);
    }

    public function scopeActive($q)
    {
        // You currently treat status like boolean 1/0 in blades & controller
        // so we keep that behavior. If your DB uses enum, cast accordingly.
        return $q->where('status', 1)->orWhere('status', 'active');
    }
}
