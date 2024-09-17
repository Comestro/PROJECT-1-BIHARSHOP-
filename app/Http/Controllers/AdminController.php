<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        
        
        // $users=User::all();
        return view('admin.dashboard');
        
        // ->with('users',$users);
    
    }


   
    
    // public function dashboard(){
    //     $catCount = Category::all();
    //     $proCount = Product::all();
    //     $userCount =User::all();
        

    //     return redirect()->route('admin.countDashboard')
    // }
}
