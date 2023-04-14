<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        return "Received all users";
    }

    public function createUser()
    {
        return "Created user";
    }

    public function updateUser()
    {
        return "Updated user";
    }

    public function deleteUser()
    {
        return "Deleted user";
    }
}
