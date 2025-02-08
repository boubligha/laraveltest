<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        // Récupérer les profils avec pagination (2 profils par page)
        $profiles = Profile::paginate(perPage: 2);
        return view("profile.profiles", compact('profiles'));
    }
    //RouteModuleBinding vous passer l'id dans route et laravel comprend que vous voulez recupere le profile de base de donnée
    public function show(Profile $profile)
    {
        return view("profile.show", compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    /*public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|min:6|confirmed',
            //verifier confirmation password  required|min:6|confirmed     //2 eme input :password_confirmation
            'bio' => 'required|string',
        ]);
        // Création du profil
        Profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash du mot de passe
            'bio' => $request->bio,
        ]);
        // Redirection avec un message de succès
        return redirect()->route('profiles.index')->with('success', 'Profil créé avec succès !');
        //redirection avec passage de data
        //return redirect()->route('profiles.index',['id']=>$id )->with('success', 'Profil créé avec succès !')->with('data', $request->all());
    }*/

    public function store(ProfileRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = bcrypt($formFields['password']);
        // Création du profil
        Profile::create($formFields);
        // Redirection avec un message de succès
        return redirect()->route('profiles.index')->with('success', 'Profil créé avec succès !');
        //redirection avec passage de data
        //return redirect()->route('profiles.index',['id']=>$id )->with('success', 'Profil créé avec succès !')->with('data', $request->all());
    }
} 
