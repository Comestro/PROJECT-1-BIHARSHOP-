<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFormattedDiscountPriceAttribute()
    {
        return '₹' . number_format($this->discount_price, 2);
    }
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes')
            ->withPivot('attribute_value_id');
    }

    public function highlights()
    {
        return $this->hasMany(ProductHighlight::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getSavingPercentageAttribute()
    {
        if ($this->price <= 0) {
            return 0;
        }

        $discountPrice = $this->discount_price ?? $this->price;
        $saving = $this->price - $discountPrice;
        $percentage = ($saving / $this->price) * 100;

        return number_format($percentage, 2);
    }

}

