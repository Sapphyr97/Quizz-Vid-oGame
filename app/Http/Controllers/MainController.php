<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use App\Models\Platform;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MainController extends Controller
{
    public function homeAction(Request $request)
    {
        // $order stocke la valeur du paramètre GET
        $order = $request->input('order');

        // Si $order existe
        if(isset($order)) {
            // $videogameList stocke tous les videogames ordonnés par la valeur de GET à la clé 'order'
            // La requête permettra de trier selon la valeur de $order
            // ->get() permet de récupérer le résultat de ma requête
            $videogameList = Videogame::orderBy($order)->get();
        } else {
            // la variable $videogameList stocke tous les videogames de la table
            // Videogame::all() === SELECT * FROM videogames
            $videogameList = Videogame::all();
        }

        // La vue home.blade.php est retournée
        // La varaible videogameList est transmise à la vue home
        // puisqu'elle est passé en deuxieme argument dans la fonction compact
        return view('home', compact('videogameList'));
    }

    public function editVideogameAction($id)
    {
       $videogame = Videogame::find($id);
       $platformList = Platform::all();

       return view('edit',compact('videogame', 'platformList'));
    }

    public function updateVideogameAction(Request $request, $id)
    {
        Videogame::where('id', $id)->update([
            'name' => $request->get('name'),
            'editor' => $request->get('editor'),
            'release_date' => $request->get('release_date'),
            'platform_id' => $request->get('platform'),

        ]);

        return redirect()->route('home')->with('success','Jeu video modifié avec succès');
    }

    public function deleteVideogameAction($id)
    {
        Videogame::where('id',$id)->delete();

        return redirect()->route('home')->with('success','Jeu video supprimé avec succès');
    }
}