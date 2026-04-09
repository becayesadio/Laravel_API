<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
       return response()->json([
        'users' => \App\Models\User::all()
       ]);
    }
        
    public function createUser(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $user = \App\Models\User::create($request->only('name', 'email', 'password'));

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }}