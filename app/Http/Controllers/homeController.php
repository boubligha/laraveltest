<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $users =[
            [ 'id'=>'1','nom'=>'amine','metier'=>'Directeur'],
            [ 'id'=>'2','nom'=>'laila','metier'=>'Professeur'],
            [ 'id'=>'3','nom'=>'sara','metier'=>'Ingenieur'],
            [ 'id'=>'4','nom'=>'mohamed','metier'=>'Developpeur'],
        ];
        return view('home', compact('users'));
    }
}
