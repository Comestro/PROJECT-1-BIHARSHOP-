<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Order;
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
        $order = Order::where('user_id', Auth::id())->where('isOrdered',0)->with('orderItems')->first();
        return view('public/cart', ['order' => $order]);
    }

    public function checkout()
    {
        $order = Order::where('user_id',Auth::id())->where('status','pending')->with('orderItems')->first();
        // dd($order);
        return view('public.checkout',['order' => $order]);
    }

    public function confirmOrder()
    {
        // $order = Order::where('user_id',Auth::id())->where('payment_status','paid')->with('orderItems')->first();
        // dd($order);
        return view('public.confirm-order');
    }

    public function filter($cat_slug, $cat_id)
    {
        $category = Category::where('cat_slug', $cat_slug)->first();
        // dd($product);
        return view('public.filter', ['category' => $category]);
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
        
                if (Auth::user()->isAdmin == 1) {
                    return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
                } else {
                    return redirect()->intended("/");
                }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'isAdmin'=> 0,
            'password' => Hash::make($request->password),
        ]);

        if($user){
            Auth::login($user);
            return redirect()->route('index')->with('success', 'Registration successful!');
        }
        else{
            return redirect()->route('login')->with('error', 'Unable to login. Please try again.');
        }

       
    }

    // logout function here
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logout successfully');
    }

    public function AboutUs(){
        return view('public.about-us');
    }
}
