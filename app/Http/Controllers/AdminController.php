<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        $catCount = Category::all();
        $proCount = Product::all();
        $userCount =User::all();
        return view('admin.dashboard')->with('catCount', $catCount)->with('proCount', $proCount)->with('userCount', $userCount);;
    }
    
    // public function dashboard(){
    //     $catCount = Category::all();
    //     $proCount = Product::all();
    //     $userCount =User::all();
        

    //     return redirect()->route('admin.countDashboard')
    // }
}
