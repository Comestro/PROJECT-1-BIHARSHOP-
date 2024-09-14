<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantAttribute extends Model
{
    protected $guarded = [];


    use HasFactory;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }

    public function productVariation()
    {
        return $this->hasOne(ProductVariant::class, "id","product_variation_id");
    }
}
