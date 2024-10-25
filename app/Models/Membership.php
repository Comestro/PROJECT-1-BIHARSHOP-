<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function user(){
        return $this->HasOne(User::class,);
    }

    public function payment()
    {
        return $this->hasOne(MembershipPayment::class, 'membership_id', 'id');
    }


}
