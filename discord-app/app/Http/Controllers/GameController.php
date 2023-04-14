<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class GameController extends Controller
{
    public function getAllPizzas()
    {
        $games = Game::query()->get();



        return [
            "success" => true,
            "data" =>$games
        ];

    }
}
