<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/', function () {
    return "Bienvenidos al discord";
});

//USERS
Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users', [UserController::class, 'createUser']);
Route::put('/users', [UserController::class, 'updateUser']);
Route::delete('/users', [UserController::class, 'deleteUser']);

//GAMES
Route::get('/games', [GameController::class, 'getGames']);

// AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);