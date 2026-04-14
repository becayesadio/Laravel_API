<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Resources\AccountResource;

/*|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|  | Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which is assigned the "api" middleware group. Enjoy building your API!
|*/ 
// cette route est protégée par le middleware 'auth:sanctum', ce qui signifie que l'utilisateur doit être authentifié pour y accéder. Lorsque l'utilisateur accède à cette route, la fonction de rappel retourne les informations de l'utilisateur authentifié en utilisant $request->user().   
Route::get('/user', function(Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// 
Route::get('/users', [UserController::class, 'index']);
Route::post('/users-create', [UserController::class, 'createUser']);
Route::post('/accounts-create', [AccountController::class, 'createAccount']);
Route::get('/accounts', [AccountController::class, 'index']);