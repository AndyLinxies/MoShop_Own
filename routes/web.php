<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ProduitController;
use App\Models\Magasin;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



//Si pas connecté redirection vers la page login
Route::group(['middleware' => ['auth']], function() {

Route::get('/', function () {
    $produits=DB::table('produits')->where('magasin_id','=',1)->get();;
    return view('app',compact('produits'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/profile', function () {
    $profile=Auth::user();
    return view('pages.profile',compact('profile'));
});

Route::get('/dashboard/personal-shop', function () {
    //Passe par le model
    $user=Auth::user()->mag->id;
    $personalShop=DB::table('produits')->where('magasin_id','=',$user)->get();
    // dd($personalShop);
    return view('pages.personalShop',compact('personalShop'));
});

Route::get('/dashboard/panier', function () {
    //Panier du user connecté
    //->cart est possible car le user est directement relié au panier
    //Panier détient la foreing key de User donc user hasOne panier
    $userPanier=Auth::user()->cart->id;

    //on part de la table intermédiaire
    $productOfpanier=DB::table('panier_produit')
    ->leftJoin('produits','panier_produit.produit_id','=','produits.id')
    ->where('panier_id','=',$userPanier)->get()
    ;
    
    // dd($productOfpanier);
    return view('pages.panier',compact('productOfpanier'));
});

Route::get('/dashboard/commandes', function () {
    $user=Auth::user()->id;
    $commandes=DB::table('commandes')
    ->where('user_id','=',$user)->get()
    ;
    // dd($commandes);
    return view('pages.commandes',compact('commandes'));
});

Route::get('/dashboard/allShops', function () {
    $magasins=DB::table('magasins')->leftJoin('users','magasins.user_id','=','users.id')->get();
    return view('pages.allShops',compact('magasins'));
});

//Modifier les infos du user
Route::put('/dashboard/profile/{id}/update',[RegisteredUserController::class,'update']);

//Ajouter un Produit
Route::post('/dashboard/produit/create',[ProduitController::class,'store']);
//Supprimer un produit
Route::delete("/dashboard/produit/{id}/delete",[ProduitController::class,'destroy']);
//Modifier un produit
Route::put("/dashboard/produit/update/{id}",[ProduitController::class,'update']);


//Ajouter au panier 
//Je passe le id dans les params de la route pour pouvoir retrouver le Produit surlequel on a cliqué via un find id dans le store
Route::post('/dashboard/ajoutPanier/produit/{id}',[PanierController::class,'store']);



//Ajout d'une commande
Route::post('/dashboard/ajoutCommande',[CommandeController::class,'store']);

//Commande detail
Route::get('/dashboard/commandeDetail/{id}', function ($id) {
        //On peut mettre les where en fonction des donnés récupérés grace aux joins. Pas seulement en fonction de la table du début.
        $produits=DB::table('panier_produit')
        ->join('produits','panier_produit.produit_id','=','produits.id')
        ->join('commandes','panier_produit.commande_id','=','commandes.id')
        ->where('panier_id',null)
        ->where('user_id',Auth::id())
        ->where('commande_id',$id)
        ->get();
    return view('pages.commandeDetail',compact('produits'));
});

//All shops Details
Route::get('/dashboard/allShopsDetail/{id}', function ($id) {
    $produits=DB::table('produits')
    ->where('magasin_id',$id)
    ->get()
    ;

    $conectedUser=Auth::id();
    return view('pages.allShopsDetail',compact('produits','conectedUser'));

});

});




require __DIR__.'/auth.php';
