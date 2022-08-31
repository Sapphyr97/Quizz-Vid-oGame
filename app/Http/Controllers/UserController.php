<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\UserSession;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\support\Facades\Hash;

class UserController extends Controller
{
    public function signupAction()
    {
        return view('user.signup');
    }

    public function createUserAction(Request $request)
    {
        // Depuis la classe Request, on vient executer la methode validate
        // elle nous permet pour chaque champs soumis du formulaire
        // nous pourront faire la validation des champs côté serveur 
        $request->validate([
            // on passe un tableau à la méthode validate
            // La clé correspond au nom du champ spécifié dans fillable
            // ainsi qu'au name spécifié dans le formulaire
            // La valeur est un tableau qui va comporter les mots clés 
            // correspondant au regex préexistant lors de l'installation d'un projet Laravel
            // Si vous souhaitez retrouver les mots clés des regex et les messages d'erreurs qui y sont liés
            // il faudra aller dans le dossier resources, dans le dossier lang, dans le fichier validation.php
            'email'     => ['required', 'email', 'max:191', 'unique:user'],
            'password'  => ['required', 'string', 'min:8']
        ]);

        // $user stocke l'instanciation du Model User
        $user = new User;

        // On vient remplir cet objet avec les valeurs des inputs email et password
        $user->email    = $request->input('email');
        // La valeur de l'input password est hasher (avec bcrypt automatiquement)
        // Hash::make permet de hasher la valeur passer en argument 
        $user->password = Hash::make($request->input('password'));

        // on stocke dans $saved l'insertion de ce user en base
        // $saved renverra true ou false selon le statut de l'execution
        $saved = $user->save();

        // si l'insertion s'est bien passé
        // si $saved === true
        if($saved) {
            // on redirige vers signup avec un message de succes
            // La fonction ->with() permet de transmettre un message dans la session de Laravel
            // Ce message est éphémère, il n'existe quele temps d'un rafraîchissement
            // deux argument sont transmis à with
            // le premier argument est la clé de la session
            // le deuxieme argument est la valeur associé à cette clé
            return redirect('/signup/')->with('success', "L'utlisateur a été ajouté avec succès");
        // sinon
        } else {
            // on redirige vers signup avec un message d'erreur
            return redirect('/signup/')->with('failed', "L'utlisateur n'a pas été ajouté");
        }

    }

    public function signinAction()
    {
        return view('user.signin');
    }

    public function signinUserAction(Request $request)
    {
        // $email et $password stocke les valeurs des inputs emails et password
        $email = $request->input('email');
        $password = $request->input('password');

        // $user stocke un utlisateur, l'utlisateur qui a l'email passé dans le formulaire
        // SELECT * FROM user WHERE email = $email
        // ->first() permet de ne récupérer qu'un seul résultat
        $user = User::where('email', $email)->first();

        // Si l'utlisateur existe et que le mot de passe soumis par le formulaire
        // correspond bien au hash du mot de passe de l'utlisateur en base
        if($user && Hash::check($password, $user->password)) {
            UserSession::connect($user);
            // On redirige vers la home
            return redirect()->route('home');
        // sinon
        } else {
            // on redirige vers signin avec un message d'erreur
            return redirect()->route('signin')->with('failed', 'Vos identifiants sont erronés');
        }
    }

    public function signoutAction()
    {
        UserSession::disconnect();

        return redirect()->route('home');
    }
}