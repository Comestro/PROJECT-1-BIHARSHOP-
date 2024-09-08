<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function variationOption()
    {
        return $this->belongsTo(VariationOption::class);
    }
}
