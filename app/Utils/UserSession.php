<?php

namespace App\Utils;

use App\Models\User;

Class UserSession
{
    // Constante contenant l'index du tableau de session
    const SESSION_INDEX_NAME = 'connectedUser';

    // Méthode permettant de connecter un utlisateur avec une session
    public static function connect(User $user)
    {
        $_SESSION[self::SESSION_INDEX_NAME] = $user;
    }

    // Méthode permettant de déconnecter un utlisateur
    public static function disconnect()
    {
        if(self::isConnected()) {
            unset($_SESSION[self::SESSION_INDEX_NAME]);
        }
    }

    // Méthode retournant un bouleen
    // On vérifie si une session à la clé 'connectedUser' est bien rempli
    public static function isConnected() : bool
    {
        return !empty($_SESSION[self::SESSION_INDEX_NAME]);
    }

    // Méthode permettant de récupérer l'objet de l'utlisateur connecté
    public static function getUser() : User
    {
        if(self::isConnected()) {
            return $_SESSION[self::SESSION_INDEX_NAME];
        }
    }
}