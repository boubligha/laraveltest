<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->login;
        $password = $request->password;
        $credentials =[ 'email' => $login, 'password' => $password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route('home');
        }else{
            return back()->withErrors([
                'login' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    public function show(){
        return view("login.show");

    }
}
