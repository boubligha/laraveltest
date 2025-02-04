<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*Route::get('/', function () {
    return view('welcome');
}); 
*/
//pass data static inside the routes 
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
//pass data dynamique dans url
/*Route::get('/home/{nom}', function ($nom) {
    return view('home', [
        'nom' => $nom,
    ]);
});
*/



//working with controller  homeController::class

Route::get('/home/{nom}',[ 'App\Http\Controllers\homeController','index' ]);
Route::get('/profile',[ 'App\Http\Controllers\ProfileController','index' ]);
Route::get('/settings',[ 'App\Http\Controllers\InformationsController','index' ]);