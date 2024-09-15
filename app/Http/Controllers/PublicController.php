<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PublicController extends Controller
{
    public function index()
    {
        // $data['categories'] = Category::all();
        // // $data['mainCategories'] = Category::where('parent_id', null)->get();

        return view('public/home');
    }
    public function productView($category, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('public/view')->with('category', $category)->with('product', $product);
    }
    
    public function cart()
    {
        return view('public/cart');
    }

    public function checkout()
    {
        return view('public.checkout');
    }

    public function filter($cat_slug)
    {
        $category = Category::where('cat_slug', $cat_slug)->first();
        $products = Product::where('category_id', $category->id)->get();

        if ($products) {
            // dd($product);
            return view('public.filter', ['category' => $category, 'products' => $products]);
        } else {
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

    public function login(Request $req)
    {

        if ($req->isMethod("post")) {
            $credentials = $req->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
                return redirect()->intended("/user");
            }
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        return view('public.login');

    }


    // show registration form:
    public function signup()
    {
        return view('public.signup');
    }


    // Handle the registration logic
    public function register(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log in the user after registration
        Auth::login($user);

        // Redirect to a desired location
        return redirect()->route('index')->with('success', 'Registration successful!');
    }

    // logout function here
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout successfully');
    }
}
