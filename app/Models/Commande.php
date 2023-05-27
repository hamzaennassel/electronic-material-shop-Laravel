<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable=[
        'montant',
        'date_commande',
        'statut',
    ];


    public function produits(){

        return $this->belongsToMany(Produit::class,'ligne_commandes');
    }
}
