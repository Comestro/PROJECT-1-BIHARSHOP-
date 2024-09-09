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
    public function filter()
    {
        return view('/public/filter');
    }

    public function ourTeam(){
        return view('public.team');
    }

    public function privacyPolicy(){
        return view('public.privacy-policy');
    }

    public function refundPolicy(){
        return view('public.refund-policy');
    }
}
