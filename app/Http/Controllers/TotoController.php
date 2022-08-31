<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TotoController extends Controller
{
    // La fonction totoAction a pour argument la classe Request
    // On stocke la classe dans la variable $request
    public function totoAction(Request $request)
    {
        $name = 'Tata';
        $name2 = 'Hey';

        // $surname contient la valeur de l'input surname lors de sa soumission
        // Si le formulaire n'est pas soumis, la valeur par défaut passer en deuxieme argument
        // sera la valeur stocké dans $surname
        $surname = $request->input('surname', 'Eva');

        // La méthode totoAction retourne la vue toto.blade.php
        // les valeurs des variables $name, $name2, $surname sont transmis à la vue toto.blade.php
        // on peut passer autant de varaible que l'on souhaite dans la fonction compact
        // Celles-ci seront donc transmis à la vue en premier argument (toto.blade.php)
        return view('toto', compact('name', 'name2', 'surname'));
    }

    public function tataAction(Request $request)
    {
        $number = $request->input('number');
        $number = intval($number);

        if($number === 51) {
            $result = 'Bravo';
        } else {
            $result = 'Nope';
        }

        return view('tata', compact('result'));
    }
}