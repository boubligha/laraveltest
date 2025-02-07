<?php

namespace App\Http\Controllers;

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

    public function show($id)
    {
        // Récupérer un profil ou renvoyer une erreur 404
        $profile = Profile::findOrFail($id);
        return view("profile.show", compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:profiles,email',
            'password' => 'required|min:6',
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
    }
}
