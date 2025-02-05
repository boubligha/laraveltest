<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome', [
        'name' => 'amine',
        'cours'=>[
            'Laravel',
            'PHP',
            'JavaScript'
        ],
    ]);
});

Route::get('/home',[ 'App\Http\Controllers\HomeController','index' ]);
Route::get('/profile',[ 'App\Http\Controllers\ProfileController','index' ]);
Route::get('/settings',[ 'App\Http\Controllers\InformationsController','index' ]);