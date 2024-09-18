<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function handleGoogleCallback()
    // {
    //     try {
    //         $googleUser = Socialite::driver('google')->stateless()->user();
    //         $existingUser = User::where('email', $googleUser->getEmail())->first();

    //         if ($existingUser) {
    //             Auth::login($existingUser);
    //         } else {
    //             $newUser = User::create([
    //                 'name' => $googleUser->getName(),
    //                 'email' => $googleUser->getEmail(),
    //                 'image' => $googleUser->getAvatar(),
    //                 'google_id' => $googleUser->getId(),
    //                 'password' => encrypt('123456dummy'),
    //             ]);
    //             if( $newUser){
    //                 Auth::login($newUser);
    //             }
    //             else{
    //                 return redirect()->route('login')->with('error', 'Unable to login with Google, please try again.');
    //             }                
    //         }

    //         return redirect()->intended('/'); // Adjust this based on your app
    //     } catch (\Exception $e) {
    //         return redirect()->route('login')->with('error', 'Unable to login with Google, please try again.');
    //     }
    // }

    public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $existingUser = User::where('email', $googleUser->getEmail())->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'image' => $googleUser->getAvatar(),
                'isAdmin' => 0,
                'google_id' => $googleUser->getId(),
                'password' => encrypt('123456dummy'),
            ]);

            if ($newUser) {
                Auth::login($newUser);
            } else {
                return redirect()->route('login')->with('error', 'Unable to login with Google, please try again.');
            }
        }

        // Check if the user is an admin
        if (Auth::user()->isAdmin == 1) {
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
        }
        else{
            return redirect()->intended('/');
        } 
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Unable to login with Google, please try again.');
    }
}


}
