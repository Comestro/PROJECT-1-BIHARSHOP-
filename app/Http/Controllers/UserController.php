<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(){
    return view('users.user'); 
   }

   public function wishlist(){
      return view('users.wishlist');
   }
}
