<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Notifications\Commander;
use Illuminate\Http\Request;


class CommandeController extends Controller
{

        public function index()
        {
                 $commandes =Commande::get();
                 return view('commandes.index',compact('commandes'));
            }
        public function store(Request $request)
        {
          
            $produit = Produit::find($request->produit_id);
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
            $quantite = $request->input('quantite', 1);
            // Trouvez une éventuelle ligne de commande existante pour ce produit dans cette commande
            $ligneCommande = LigneCommande::where('commande_id', $commande->id)->where('produit_id', $produit->id)->first();
            if (!$ligneCommande) {
                // Créez une nouvelle ligne de commande pour ce produit
                $ligneCommande = new LigneCommande();
                $ligneCommande->commande_id = $commande->id;
                $ligneCommande->produit_id = $produit->id;
                $ligneCommande->prix_unitaire = $produit->prix;
                $ligneCommande->quantite =  $request->qty ;
                $ligneCommande->save();
            }
    
             // Mettre à jour le montant total de la commande
             $commande->montant = LigneCommande::where('commande_id', $commande->id)
                                    ->selectRaw('SUM(prix_unitaire * quantite) as total')
                                    ->value('total');;
             $commande->save();
            
             
             
            return redirect()->back()->with('success', 'Le produit a été ajouté commander.');
           
        }


        public function edit($id)
        {
    
            $commande = Commande::findorfail($id);
           
                return view('commandes.edit',compact('commande'));
        }
        public function update(Request $request, $id)
        {
            $commande = Commande::findorfail($id);
            $commande->date_commande = $request->date_commande;
            $commande->montant = $request->montant;
            $commande->statut = $request->statut; 
            $commande->save();

            return redirect()->route('commande.index'); 
        }
        public function delete($id)
        {
            Commande::destroy($id);
            return redirect()->route('commande.index');
        }

}