<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      return view('users.user');
   }

   public function wishlist()
   {
      return view('users.wishlist');
   }
   public function MyOrder(){
      return view('users.my-order'); 
     }

     public function MyCoupon(){
      return view('users.my-coupons');
     }

     public function GiftCard(){
      return view('users.gift-card');
     }
}
