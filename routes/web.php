<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;

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

Route::get('/home',[ ProfileController::class,'index' ])->name('home');
Route::get('/profiles',[ 'App\Http\Controllers\ProfileController','index' ])->name('profiles.index');
//
//envoyer des parametres dans la route avec condition
Route::get('/profiles/{id}',[ 'App\Http\Controllers\ProfileController','show' ])
->where('id','\d+')
->name('profiles.show');

Route::get('/profiles/create',[ 'App\Http\Controllers\ProfileController','create' ])
->name('create');

Route::post('/profiles/store',[ 'App\Http\Controllers\ProfileController','store' ])
->name('store');

Route::get('/settings',[ 'App\Http\Controllers\InformationsController','index' ])->name('settings.index');
