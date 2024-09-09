<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }
    
    public function dashboard(){
        $categoriesCount = Category::count();

        return view('admin.dashboard', compact(
            'categoriesCount',
        ));
    }
}
