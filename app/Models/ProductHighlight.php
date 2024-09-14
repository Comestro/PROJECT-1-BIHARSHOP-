<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHighlight extends Model
{
    use HasFactory;
    protected $table = "products_highlights";
    protected $fillable = [
        'product_id',
        'highlights',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
