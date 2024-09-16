<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function users()
{
    return $this->belongsToMany(User::class, 'coupon_user')->withTimestamps();
}

}
