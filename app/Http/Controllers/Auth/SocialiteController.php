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

    public function handleGoogleCallback()
    {
        try {
            // Retrieve the user's information from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user already exists in your database
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                // Log the user in if they exist
                Auth::login($existingUser);
            } else {
                // If the user doesn't exist, create a new user
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => encrypt('123456dummy'), // Use a dummy password or improve security
                ]);

                // Log the new user in
                Auth::login($newUser);
            }

            // Redirect to the homepage or another appropriate page for your e-commerce site
            return redirect()->intended('/'); // Adjust this based on your app
        } catch (\Exception $e) {
            // In case of error, redirect back to the login page with an error message
            return redirect()->route('login')->with('error', 'Unable to login with Google, please try again.');
        }
    }
}
