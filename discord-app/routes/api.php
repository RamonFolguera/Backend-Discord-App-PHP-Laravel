<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PartyController;
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

Route::group([
    'middleware' => 'auth:sanctum'
    ], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/my-profile', [AuthController::class, 'myProfile']);
    //TODO
    Route::put('/my-profile', [AuthController::class, 'updateMyProfile']);
});

//PARTIES
Route::post('/party', [PartyController::class, 'createParty']);
Route::get('/partiesByGameId/{id}', [PartyController::class, 'getAllPartiesByGameId']);
Route::group([
    'middleware' => 'auth:sanctum'
    ], function () {
    Route::post('/party/join', [PartyController::class, 'joinParty']);
    Route::post('/party/leave', [PartyController::class, 'leaveParty']);
});

//MESSAGES

Route::group([
    'middleware' => 'auth:sanctum'
    ], function () {
Route::post('/messages/new', [MessageController::class, 'createMessage']);
Route::put('/messages/{id}', [MessageController::class, 'updateMessageById']);
Route::delete('/messages/{id}', [MessageController::class, 'deleteMessageById']);
Route::get('/messages/party/{id}', [MessageController::class, 'getAllMessagesByPartyId']);
});





