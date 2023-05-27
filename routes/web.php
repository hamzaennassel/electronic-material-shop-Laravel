<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.Home');
})->name('Home');
Route::get('/categorie', function () {
    return view('front.categorie');
})->name('categorie');
Route::get('/About', function () {
    return view('front.About');
})->name('About');
Route::get('/Contact', function () {
    return view('front.contactUs');
})->name('Contact');
Route::get('/Laptops', function () {
    return view('categorie.Laptops');
})->name('Laptops');
Route::get('/Accessories', function () {
    return view('categorie.Accessories');
})->name('Accessories');
Route::get('/Cameras', function () {
    return view('categorie.Cameras');
})->name('Cameras');
Route::get('/Smartphones', function () {
    return view('categorie.Smartphones');
})->name('Smartphones');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home',[HomeController::class,'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/*
Route::controller(ProduitController::class)->group(function(){

Route::get('produit', 'index')->name('produit');
Route::get('produit/create', 'create');
Route::post('produit/insert', 'insert')->name('produit.insert');
Route::get('produit/edit/{id}', 'edit')->name('produit.edit');
Route::put('produit/update/{id}',  'update')->name('produit.update');
Route::get('produit/delete/{id}',  'delete')->name('produit.delete');
Route::get('produit/deleteAll',  'deleteAll')->name('produit.deleteAll');
Route::get('produit/TrunCate',  'TrunCate')->name('produit.TrunCate');
});
*/
Route::resource('produit',ProduitController::class)->middleware('admin');
Route::get('/produit', [ProduitController::class, 'index'])->name('produit.index')->middleware('admin');
Route::get('/show/{categorie}',[HomeController::class,'show'])->name('home.show');
Route::get('/dashadmin',[HomeController::class,'dashboard'])->name('dashadmin');

Route::group(['middleware' => ['auth']], function () {
Route::Post('/panier/ajouter',[PanierController::class,'ajouterAuPanier'])->name('ajouterAuPanier');
Route::get('/panier',[PanierController::class,'index'])->name('panier.index');
Route::put('/panier/{rowId}',[PanierController::class,'update'])->name('panier.update');
Route::delete('/panier/{rowId}',[PanierController::class,'remove'])->name('panier.remove');
});

Route::get('/removeAll', function(){
    Cart::destroy();
})->name('panier.removeAll'); 

Route::post('/commande/add',  [CommandeController::class,'store'])->name('commande.store')->middleware('auth');
Route::group(['middleware' => ['admin']], function () {
    Route::get('/commande', [CommandeController::class,'index'])->name('commande.index');
    Route::get('/commande/edit/{id}', [CommandeController::class,'edit'] )->name('commande.edit');
    Route::put('/commande/update/{id}', [CommandeController::class,'update'])->name('commande.update');
    Route::delete('/commande/delete/{id}', [CommandeController::class,'delete'] )->name('commande.delete');
});
Route::group(['middleware' => ['admin']], function () {
    Route::get('/user', [UserController::class,'index'])->name('user.index');
    Route::get('/user/edit/{id}', [UserController::class,'edit'] )->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class,'delete'] )->name('user.delete');
});


Route::get('/search', [SearchController::class,'search'])->name('search');

Route::post('/send',[MailController::class,'send'])->name('send.email');





