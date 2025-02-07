<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        /*$profiles = Profile::all();   to bring all the data from DB*/
        //you choose the number of data you want to bring from the database
        $profiles = Profile::paginate(2);
        return view("profile.profiles",compact('profiles'));


    }

    public function show(Request $request){
        /* pour afficher reauest data 
        dd($request);
        pour afficher une seul info 
        dd($request->id);
        */
        $id = (int)$request->id;
        $profie=Profile::find($id);
        if($profie === NULL){
            return abort(404);
        }
        //$profie=Profile::findOrFail($id);
        return view("profile.show",compact('profie'));
    }

    public function create(){
        return view('profile.create');
    }
}
