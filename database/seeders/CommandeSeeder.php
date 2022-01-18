<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Imaginons qu'il a acheté seulement un paquet de ships
        // $produits=Produit::sum('prixProduit');
        DB::table('commandes')->insert([
            [
                "user_id"=>1,
                "totalPrice"=>2
            ]
        ]);
    }
}
