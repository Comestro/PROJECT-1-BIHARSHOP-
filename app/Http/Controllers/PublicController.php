<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{  public function index()
    {
        return view('/public/home');
    }
    public function view()
    {
        return view('public/view');
        
    }
    public function cart()
    {
        return view('public/cart');
    }
}
