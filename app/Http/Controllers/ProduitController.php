<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $produits =Produit::get();
         return view('produits.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produits.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     /*   $request->validate([
            'ref' => 'required',
            'categorie' => 'required',
            'description' => 'required',
            'image' => 'required',
            'prix' => 'required',
            'stock' => 'required',
        ]);
*/
        if($request->hasFile('photo')){
            $destination_path='public/imgs/produits';
            $image = $request->file('photo');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('photo')->storeAs($destination_path,$image_name);

        }

      
        Produit::create([
            'ref' =>$request->ref,
            'categorie'=>$request->categorie,
            'titre'=>$request->titre,
            'description'=>$request->description,
            'image' => $image_name,
            'prix' =>$request->prix,
            'stock'=>$request->stock,

        ]);

        return redirect('/produit');
    }

    /**
     * Display the specified resource.
     */
   /* public function show($categorie)
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
        
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $produit = Produit::findorfail($id);
       
            return view('produits.edit',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::findorfail($id);
        $produit->ref = $request->ref;
        $produit->categorie = $request->categorie;
        $produit->titre = $request->titre;
        $produit->description = $request->description;
    
        // Supprimer l'ancienne image si une nouvelle est téléchargée
    if ($request->hasFile('photo')) {
        Storage::delete('public/imgs/produits' . $produit->photo);
    }

    // Enregistrer la nouvelle image si une est téléchargée
    if ($request->hasFile('photo')) {
        $filename = $request->photo->getClientOriginalName();
        $path = $request->photo->storeAs('public/imgs/produits', $filename);
        $produit->image = $filename;
    }
        
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->save();
        return redirect()->route('produit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produit::destroy($id);
        return redirect()->route('produit.index');
    }
}
