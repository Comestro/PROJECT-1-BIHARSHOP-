<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function index()
    {
        // $data['categories'] = Category::all();
        // // $data['mainCategories'] = Category::where('parent_id', null)->get();
       
        return view('public/home');
    }
    public function view()
    {
        return view('public/view');
    }
    public function cart()
    {
        return view('public/cart');
    }
    public function filter($cat_slug)
    {
        $category = Category::where('cat_slug', $cat_slug)->first();
        $products = Product::where('category_id',$category->id)->get();

        if ($products){
            // dd($product);
            return view('public.filter', ['category' =>$category,'products'=>$products]);
        }else{
            return redirect()->route('public/home')->with('error', 'No Product Found');
        }
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
