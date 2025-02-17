<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'login' => 'required|email', // Ensure login is an email
            'password' => 'required|min:6', // Ensure password is at least 6 characters
        ]);

        // Get the login credentials (email or username)
        $login = $request->login;
        $password = $request->password;

        // Prepare credentials array
        $credentials = ['email' => $login, 'password' => $password];

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();

            // Redirect with success message
            return to_route('home')->with('success', 'Welcome back!');
        } else {
            // Redirect back with an error message
            return back()->withErrors([
                'login' => 'The email or password is incorrect.',
            ]);
        }
    }

    public function show()
    {
        // Show the login form
        return view('login.show');
    }

    public function logout()
    {
        // Flush the session and log the user out
        session()->flush();
        Auth::logout();

        // Redirect to the home route (or login page)
        return to_route('login.show')->with('success', 'You have been logged out.');
    }
}
