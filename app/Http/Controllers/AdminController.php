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

        $catCount = Category::all();
        $proCount = Product::all();
        $userCount =User::all();
        $orderCount=Order::all();
        $orderItems = OrderItem::select('order_items.*')
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->orderByRaw("CASE WHEN orders.status = 'completed' THEN 3 WHEN orders.status = 'processing' THEN 2 WHEN orders.status = 'pending' THEN 1 ELSE 4 END")
        ->orderBy('order_items.created_at', 'asc')
        ->take(10)
        ->get();
        return view('admin.dashboard')
        ->with('catCount', $catCount)
        ->with('proCount', $proCount)
        ->with('userCount', $userCount)
        ->with('orderCount',$orderCount)
        ->with('orderItems', $orderItems);
    
    }

   
    
    // public function dashboard(){
    //     $catCount = Category::all();
    //     $proCount = Product::all();
    //     $userCount =User::all();
        

    //     return redirect()->route('admin.countDashboard')
    // }
}
