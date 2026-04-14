<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    // permet de récupérer tous les comptes
public function index()
    {
        $accounts = Account::all(); // Récupère tous les comptes de la base de données
        return response()->json([
            'message' => 'comptes recupérés avec succès', // Message indiquant que les comptes ont été récupérés avec succès    
            'data' => AccountResource::collection($accounts)
        ]);
    }

    public function createAccount(AccountRequest $request)
    {
        $account = Account::create($request->validated()); // Crée un nouveau compte dans la base de données en utilisant les données validées

        return response()->json([       // Retourne une réponse JSON indiquant que le compte a été créé avec succès, ainsi que les données du compte nouvellement créé formatées à l'aide de la ressource AccountResource.
            'message' => 'compte créé avec succès',
            'data' => AccountResource::make($account) // Formate les données du compte nouvellement créé à l'aide de la ressource AccountResource
        ]);
    }

}
