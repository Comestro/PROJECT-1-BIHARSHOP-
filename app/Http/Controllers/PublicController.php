<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        // $data['mainCategories'] = Category::where('parent_id', null)->get();
       
        return view('public/home',$data);
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

    public function ourTeam()
    {
        return view('public.team');
    }

    public function privacyPolicy()
    {
        return view('public.privacy-policy');
    }

    public function refundPolicy()
    {
        return view('public.refund-policy');
    }
  
}
