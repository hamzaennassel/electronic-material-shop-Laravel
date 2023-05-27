<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class SearchController extends Controller
{
    
    public function search(Request $request){
        $keyword = $request->input('keyword');

        // Effectuez la recherche dans votre modèle Product (vous pouvez adapter cela en fonction de votre modèle)
        $produits = Produit::where('titre', 'like', "%$keyword%")->get();

        return view('search.results')->with('produits',$produits);
    }
}
