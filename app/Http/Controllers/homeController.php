<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller 
{
    public function index(Request $request){
        return view('home',
        [
            'nom' => $request->nom,
        ]);
    }
}
