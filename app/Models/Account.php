<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $fillable = [ // Spécifie les champs qui peuvent être remplis en masse lors de la création ou de la mise à jour d'un compte dans la base de données.
        'user_id',
        'numero_compte',
        'solde',
        'code',
    ];
    public function user()  // Définit une relation entre le modèle Account et le modèle User, indiquant que chaque compte appartient à un utilisateur.
    {
        return $this->belongsTo(User::class);
    }
}
