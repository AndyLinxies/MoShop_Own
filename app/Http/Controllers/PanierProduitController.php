<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePanier_produitRequest;
use App\Http\Requests\UpdatePanier_produitRequest;
use App\Models\Panier_produit;

class PanierProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePanier_produitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePanier_produitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panier_produit  $panier_produit
     * @return \Illuminate\Http\Response
     */
    public function show(Panier_produit $panier_produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panier_produit  $panier_produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Panier_produit $panier_produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePanier_produitRequest  $request
     * @param  \App\Models\Panier_produit  $panier_produit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePanier_produitRequest $request, Panier_produit $panier_produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panier_produit  $panier_produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panier_produit $panier_produit)
    {
        //
    }
}
