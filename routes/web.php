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

Route::get('/home',[ 'App\Http\Controllers\HomeController','index' ])->name('home');
Route::get('/profiles',[ 'App\Http\Controllers\ProfileController','index' ])->name('profiles.index');
//ProfileController::class
//envoyer des parametres dans la route avec condition
Route::get('/profiles/{id}',[ 'App\Http\Controllers\ProfileController','show' ])
->where('id','\d+')
->name('profiles.show');
Route::get('/settings',[ 'App\Http\Controllers\InformationsController','index' ])->name('settings.index');