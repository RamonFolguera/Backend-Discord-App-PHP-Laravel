<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/', function () {
    return "Bienvenidos al discord";
});

//PLAYERS
Route::get('/players', [PlayerController::class, 'getPlayers']);
Route::post('/players', [PlayerController::class, 'createPlayer']);
Route::put('/players', [PlayerController::class, 'updatePlayer']);
Route::delete('/players', [PlayerController::class, 'deletePlayer']);

//GAMES
Route::get('/games', [GameController::class, 'getGames']);
