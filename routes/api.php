<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function(Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Users
Route::get('/users', [UserController::class, 'index']);
Route::post('/users-create', [UserController::class, 'createUser']);
Route::post('/user-create', [UserController::class, 'createUser']);

// Accounts
Route::post('/accounts-create', [AccountController::class, 'createAccount']);
Route::get('/accounts', [AccountController::class, 'index']);

// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Transactions (protégées)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index']);
});