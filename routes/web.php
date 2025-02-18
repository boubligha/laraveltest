<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;

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



Route::get('/profiles/create',[ 'App\Http\Controllers\ProfileController','create' ])
->name('create');

Route::get('/profiles/{profile:id}',[ 'App\Http\Controllers\ProfileController','show' ])
->where('profile','\d+')
->name('profiles.show');

Route::post('/profiles/store',[ 'App\Http\Controllers\ProfileController','store' ])
->name('store');

Route::get('/login',[ LoginController::class,'show' ])
->name('login.show');
//pour supprimer un profile
Route::delete('/profiles/{profile:id}',[ ProfileController::class,'destroy' ])
->name('profiles.destroy');

Route::post('/login',[ LoginController::class,'login' ])
->name('login.login');
Route::get ('/logout',[ LoginController::class,'logout' ])
->name('login.logout');
Route::get('/profiles/{profile}/edit',[ ProfileController::class,'edit' ])
->name('profiles.edit');
Route::put('/profiles/{profile}',[ ProfileController::class,'update' ])
->name('profiles.update');
Route::get('/settings',[ 'App\Http\Controllers\InformationsController','index' ])->name('settings.index');