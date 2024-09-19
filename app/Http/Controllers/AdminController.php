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
    // public function index()
    // {
    //     $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total_sales')
    //     ->groupBy('month')
    //     ->get()
    //     ->pluck('total_sales', 'month');
        
    //     $canceledOrdersData = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as canceled_orders')
    //         ->where('status', 'canceled')
    //         ->groupBy('month')
    //         ->get()
    //         ->pluck('canceled_orders', 'month');

    //     // Pass the data to the view
    //     return view('admin.dashboard', [
    //         'salesData' => $salesData,
    //         'canceledOrdersData' => $canceledOrdersData,
    //     ]);
    // }
    // In your controller


    public function index()
    {
        // Data to be plotted (Logins and Contents Viewed)
        $data = [
            'total_orders' => [5, 10, 15, 20], // Example data
            'new_users' => [1, 2, 3, 5], // Example data
            'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun', 'July', 'Aug' , 'Sep', 'Oct','Nov', 'Dec'] // Example months
        ];

        // Pass the data to the view
        return view('admin.dashboard', compact('data'));
    }
        

    


   
    
    // public function dashboard(){
    //     $catCount = Category::all();
    //     $proCount = Product::all();
    //     $userCount =User::all();
        

    //     return redirect()->route('admin.countDashboard')
    // }
}
