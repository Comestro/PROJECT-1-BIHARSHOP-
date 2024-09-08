<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }
    // public function insertCategory(){
    //     return view('admin.insertCategory');
    // }
    // public function manageCategory(){
    //     return view('admin.manageCategory');
    // }
    // public function insertProduct(){
    //     return view('admin.insertProduct');
    // }
    // public function manageProduct(){
    //     return view('admin.manageProduct');
    // }
}
