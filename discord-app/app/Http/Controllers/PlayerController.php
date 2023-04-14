<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function getUsers()
    {
        return "Get all players";
    }

    public function createUser()
    {
        return "Create player";
    }

    public function updateUser()
    {
        return "Update player";
    }

    public function deleteUser()
    {
        return "Delete player";
    }
}
