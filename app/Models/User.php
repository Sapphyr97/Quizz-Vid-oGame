<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // On spécifie le nom de la table car on ne répond pas exactement aux conditions de Laravel
    protected $table = 'user';

    // $fillable permet de définir quelles colonnes seront valider lors de la soumission du formulaire
    protected $fillable = [
        'email', 'password'
    ];
}
