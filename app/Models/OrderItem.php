<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function products()
    {
        return $this->hasOne(Product::class, "id", 'product_id');
    }

    public function sizeVariant()
    {
        return $this->belongsTo(ProductVariantModel::class, 'size_variant_id');
    }

    public function colorVariant()
    {
        return $this->belongsTo(ProductVariantModel::class, 'color_variant_id');
    }
}
