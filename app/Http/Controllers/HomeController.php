<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    

    public function index(){
        
        if(Auth::id()){

            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){

                return view('front.Home');
            }

            else if($usertype == 'admin'){

                // return view('admin.adminhome');
                return redirect()->route('dashadmin');
            }

            else
            {
                return redirect()->back();
            }
        }

    }

        public function show($categorie)
        {
           
            if($categorie=="Laptops"){
                $produits = Produit::where('categorie', $categorie)->get();
                return view('categorie.Laptops', compact('produits'));
            }
            else 
            if($categorie=="Accessories"){
                $produits = Produit::where('categorie', $categorie)->get();
                return view('categorie.Accessories', compact('produits'));
            }
            else
            if($categorie=="Cameras"){
                $produits = Produit::where('categorie', $categorie)->get();
                return view('categorie.Cameras', compact('produits'));
            }
            if($categorie=="Smartphones"){
                $produits = Produit::where('categorie', $categorie)->get();
                return view('categorie.Smartphones', compact('produits'));
            }
            
        }

        public function dashboard(){
                // Statistiques générales
                $totalUsers = User::count();
                $totalCommands = Commande::count();
                $totalSales = Commande::sum('montant');
                $totalProducts = Produit::count();
        
                // Graphique des ventes (exemples de données aléatoires)
                $salesData = DB::table('commandes')
                    ->select(DB::raw('YEAR(date_commande) as year, MONTH(date_commande) as month, SUM(montant) as total_sales'))
                    ->groupBy('year', 'month')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->limit(12)
                    ->get();
        
                // Dernières commandes
                $latestCommands = Commande::orderBy('date_commande', 'desc')
                    ->take(5)
                    ->get();
        
                // Produits populaires
                $popularProducts = DB::table('ligne_commandes')
                    ->select('produit_id', 'produits.titre', DB::raw('SUM(quantite) as total_quantity'), DB::raw('SUM(prix_unitaire * quantite) as total_revenue'))
                    ->join('produits', 'ligne_commandes.produit_id', '=', 'produits.id')
                    ->groupBy('produit_id', 'produits.titre')
                    ->orderBy('total_quantity', 'desc')
                    ->limit(5)
                    ->get();
        
              
        
                return view('admin.adminhome', compact('totalUsers', 'totalCommands', 'totalSales', 'totalProducts', 'salesData', 'latestCommands', 'popularProducts'));
            
        }
    
}
