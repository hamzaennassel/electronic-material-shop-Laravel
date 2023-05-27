<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Form;
use Gloudemans\Shoppingcart\Facades\Cart;




class PanierController extends Controller
{
    /*
    public function index(Request $request){

        $ligneCommande = $request->session()->get('ligneCommande', collect());
        $commande = $request->session()->get('commande', collect());

    return view('panier.index', compact('ligneCommande','commande'));
    }
    public function ajouterAuPanier($produitId)
    {
      
        $produit = Produit::find($produitId);
        if (!$produit) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
        $commande = Commande::where('statut', 'en cours')->where('user_id', auth()->user()->id)->first();
        if (!$commande) {
            // Créez une nouvelle commande
            $commande = new Commande();
            $commande->date_commande = now();
            $commande->montant = 0;
            $commande->statut = 'en cours';
            $commande->user_id = auth()->user()->id;
            $commande->save();
        }

        // Trouvez une éventuelle ligne de commande existante pour ce produit dans cette commande
        $ligneCommande = LigneCommande::where('commande_id', $commande->id)->where('produit_id', $produit->id)->first();
        if (!$ligneCommande) {
            // Créez une nouvelle ligne de commande pour ce produit
            $ligneCommande = new LigneCommande();
            $ligneCommande->commande_id = $commande->id;
            $ligneCommande->produit_id = $produit->id;
            $ligneCommande->prix_unitaire = $produit->prix;
            $ligneCommande->quantite = 1;
            $ligneCommande->save();
        }

         // Mettre à jour le montant total de la commande
         $commande->montant = LigneCommande::where('commande_id', $commande->id)->sum('prix_unitaire');
         $commande->save();

        //return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
        return redirect()->route('indexCart')->with([
            'ligneCommande' => $ligneCommande,
             'commande' => $commande->montant]);
    }

    public function update(Request $request, $id)
    {

        $ligneCommande = LigneCommande::findOrFail($id);
    
        // Vérifiez que la quantité est supérieure à zéro
        $quantite = $request->input('quantite', 1);
        if ($quantite <= 0) {
            return redirect()->back()->with('error', 'La quantité doit être supérieure à zéro.');
        }
    
        // Mettez à jour la quantité et sauvegardez la ligne de commande
        $ligneCommande->quantite = $quantite;
        $ligneCommande->save();
    
        // Redirigez vers la page du panier avec un message de succès
        return redirect()->route('cart.index')->with('success', 'Le panier a été mis à jour.');
    }
    */
    /*
       $duplicata = Cart::search(function ($cartItem,$rowId)   use ($request){
            return $cartItem->id === $request->product_id;
        });

        if($duplicata ->isNotEmpty()){
             return back()->with('success','le produit a deja ete ajouter');
        }
*/
    public function index(){
        return view('panier.index');
    }
    public function ajouterAuPanier(Request $request){

      
        $produit = Produit::find($request->produit_id);
       
        $cart = Cart::add($produit->id,$produit->titre, $request->quantite ,$produit->prix)
        ->associate('App\Models\Produit');

        return redirect()->route('panier.index');
    }
    public function update(Request $request, $rowId)
    {
        $quantite = $request->input('quantite');
    
        // Vérifiez que la quantité est supérieure à zéro
        if ($quantite <= 0) {
            return redirect()->back()->with('error', 'La quantité doit être supérieure à zéro.');
        }
        
        Cart::update($rowId, $quantite);
    
        return redirect()->route('panier.index')->with('success', 'La quantité du produit a été mise à jour.');
    }


    public function remove($rowId){

        Cart::remove($rowId);

        return back()->with('success','Le produit a ete bien supprimer.');
    }



    }





