<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class create_categories_table extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'parent_category_id', 'cat_slug', 'image'];

    // Relationship: A category can have many subcategories
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    // Relationship: A category belongs to a parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }
}
