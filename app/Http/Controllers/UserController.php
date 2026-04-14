<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
// 
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs de la base de données
        return response()->json([
            'message' => 'Users retrieved successfully', // Message indiquant que les utilisateurs ont été récupérés avec succès
            'data' => UserResource::collection($users)
        ]);
    }


    public function createUser(UserRequest $request)
    {

        // $breukh = $request->validate([
        //     'name' => 'required|string|max:255|min:3',
        //     'email' => "required|email|unique:users,email",
        //     'password' => 'required|string|min:6',
        // ]);

        // $breukh = $request->validated();

        $user = User::create($request->validated()); // Crée un nouvel utilisateur dans la base de données en utilisant les données validées

        return response()->json([       // Retourne une réponse JSON indiquant que l'utilisateur a été créé avec succès, ainsi que les données de l'utilisateur nouvellement créé formatées à l'aide de la ressource UserResource.
            'message' => 'User created successfully',
            'data' => UserResource::make($user)

        ], 201); // Le code de statut HTTP 201 indique que la ressource a été créée avec succès);
    }
}
