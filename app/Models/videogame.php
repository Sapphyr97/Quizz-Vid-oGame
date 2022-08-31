<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    // Le nom de ma méthode correspondra au nom du nouvel attribut rempli
    // avec toutes les informations de la relation
    public function platform()
    {
        // https://laravel.com/docs/8.x/eloquent-relationships

        // La methode platform retourne la relation 1N donc belongsTo
        // La clé étrangère 'platform_id' de videogame appartient à la clé primaire 'id' de platform
        // belongsTo ici, on lui passe 3 arguments
        // Le 1er, définit avec quel Model La relation doit être créé
        // Le 2eme, définit la clé étrangère par la quelle les deux tables sont liées
        // Le 3eme, définit la clé primaire du model associé sur laquelle est faire la relation
        // belongsTo permet en finalité de venir ajouter à l'objet Videogame, l'attribut platform
        // rempli avec les informations de la platform du videogame courant
        return $this->belongsTo('App\\Models\\Platform', 'platform_id', 'id');
    }
}
