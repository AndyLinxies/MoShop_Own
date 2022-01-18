<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Magasin;
use App\Models\Panier;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        //L'image
        $request->file('picture')->storePublicly('img/','public');
        //
        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'picture'=>$request->file('picture')->hashName(),
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        //Quand on crée un User on crée un Magasin et un Panier Lié à cet user
        //Le Auth::user existe deja vu qu'il vient d'être créé plus haut
        
        //Le magasin
        $createMagasin= new Magasin;
        $createMagasin->nomMagasin='Le magasin de '.Auth::user()->firstName;
        $createMagasin->user_id=Auth::user()->id;
        $createMagasin->save();
        //Le panier
        $createPanier= new Panier;
        $createPanier->user_id=Auth::user()->id;
        $createPanier->save();




        //Les Commandes par contre sont créées au moment de la validation du panier . Le stock est au niveau du produit

        return redirect(RouteServiceProvider::HOME);
    }

    public function update($id, Request $request){
        // dd('update function');

        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ]);

        
        $update= User::find($id);
        $update->firstName = $request->firstName;
        $update->lastName = $request->lastName;
        $update->email = $request->email;
        // $update->password = $request->password;

        //Ajouter
        $request->file('picture')->storePublicly('img/','public');
        //modifier
        $update->picture= $request->file('picture')->hashName();

        $update->save();
        return redirect()->back();
    }
}
