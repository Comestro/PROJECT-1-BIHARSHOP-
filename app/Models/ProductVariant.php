<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relationship with ProductVariantAttribute (to get attributes for the variant)
    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }

    // Get attribute values for a variant
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attributes', 'product_variant_id', 'attribute_value_id')
                    ->withTimestamps();
    }

    public function attributes()
    {
        return $this->hasManyThrough(
            Attribute::class,
            AttributeValue::class,
            'id', // Foreign key on the attribute_values table
            'id', // Foreign key on the attributes table
            'attribute_value_id', // Local key on the product_variant_attributes table
            'attribute_id' // Local key on the attribute_values table
        );
    }


    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format($this->price, 2);
    }


}
