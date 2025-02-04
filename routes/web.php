<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
}); 
*/
//pass data static inside the routes 
Route::get('/', function () {
    return view('welcome', [
        'name' => 'James',
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
//if there a lot of vars we can do like this /home/{nom}/{prenom}/{age}', function ($nom,$prenom,$age)
//or we can use auto loader with class Illuminate/http/Request

//les callback
Route::get('/profile/{nom}/{prenom}', function (Request $request) {
    return view('profile', [
        'nom' => dd($request->nom),
        'prenom' => dd($request->prenom),
    ]);
});

//working with controller  homeController::class

Route::get('/home/{nom}',[ 'App\Http\Controllers\homeController','index' ]);