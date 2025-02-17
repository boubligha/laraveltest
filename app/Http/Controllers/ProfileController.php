<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function store(ProfileRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($formFields['password']);
        Profile::create($formFields);
        return redirect()->route('profiles.index')->with('success', 'Profil créé avec succès !');
    }
    public function destroy(Profile $profile){
        $profile->delete();
        return redirect()->route('home')->with('success','profile supprimé avec succès');
    }
}
