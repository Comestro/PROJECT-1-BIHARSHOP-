<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
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

   public function manageMembership(){
      return view('admin.membership.manageMembership');
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

   public function membership(){
      $user = Auth::user();
      $member = Membership::where('user_id',$user->id)->first();
      if($member){
         if($member->isPaid){
            return view('users.member-view',['member' => $member]); 
         }
         else{
            return view('users.member-edit'); 
         }
      }
      else{
         return view('users.membership'); 
      }    
   }
   
   public function membershipPayment($token){

      $user = Auth::user();
      $member = Membership::where('user_id',$user->id)->where('isPaid',1)->first();
      if($member){
         return view('users.member-view',['member' => $member]); 
      }else{
         $data = Membership::where('token',$token)->first();
         return view('users.membership-payment', ['data' => $data]);
      } 
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

   //   public function membership(){
   //    return view("users.membership");
   //   }
}
