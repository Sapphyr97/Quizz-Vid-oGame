<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Videogame;
use App\Utils\UserSession;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function homeAction()
    {
        if(!UserSession::isConnected()) {
            return redirect()->route('signin');
        }

        $platformList = Platform::all();

        // La vue admin.blade.php est retournée
        return view('admin', compact('platformList'));
    }

    public function createVideogameAction(Request $request)
    {
        if(!UserSession::isConnected()) {
            return redirect()->route('signin');
        }
        
        // On stocke les valeurs de chaques inputs
        $name = $request->input('name');
        $editor = $request->input('editor');
        $release_date = $request->input('release_date');
        $platform = $request->input('platform');

        if(!empty($name)
        && !empty($editor)
        && !empty($release_date)
        && !empty($platform)) {
            // $videogame stocke l'instanciation du model Videogame
            $videogame = new Videogame();

            // $videogame est rempli pour chacun de ces attributs
            // avec la valeur de l'input correspondant
            $videogame->name            = $name;
            $videogame->editor          = $editor;
            $videogame->release_date    = $release_date;
            $videogame->platform_id     = $platform;

            // Cet objet préalablement rempli est insérer en base avec la méthode save()
            $videogame->save();

            // redirect() permet de rediriger vers la route spécifié en argument de la méthode route()
            return redirect()->route('home');
        } else {
            dd('Erreur');
        }

    }
}