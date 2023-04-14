<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function getPlayers()
    {
        return "Received all players";
    }

    public function createPlayer()
    {
        return "Created player";
    }

    public function updatePlayer()
    {
        return "Updated player";
    }

    public function deletePlayer()
    {
        return "Deleted player";
    }
}
