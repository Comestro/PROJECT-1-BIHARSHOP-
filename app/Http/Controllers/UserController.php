<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      return view('users.user');
   }

   public function manageUser(){
      return view('admin.user');
   }

   
   public function viewUserWishlist($userId){
      $data['user']=User::find($userId);
      return view('admin.wishList',$data);
   }
   
   public function viewUserOrder($userId){
      return view('admin.callingOrder',['userId' => $userId]);
   }

    
   public function viewUserAddress($userId){
      $data['user']=User::find($userId);
      return view('admin.userAddress',$data);
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

     public function MyAddress(){
      return view("users.address");
     }

     public function payment(){
      return view("users.payment");
     }
}
