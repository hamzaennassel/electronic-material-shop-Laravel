<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
 

    protected $fillable=[
        'ref',
        'categorie',
        'titre',
        'description',
        'image',
        'prix' ,
        'stock',
    ];

    public function ligneCommandes()
    {
        return $this->belongsToMany(Commande::class,'ligne_commandes');
    }
    

}
