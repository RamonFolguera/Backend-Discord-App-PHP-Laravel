<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAllUsersByAdmin(Request $request)
    {
        try {
            Log::info("Get All Users By Admin working");

            $userId = auth()->user()->id;
        
            $userAdmin = DB::table('users')->where('role_id', '=', 2)->first();
            $userAdminId = $userAdmin->id;

            if($userAdminId === $userId) {
                $users = DB::table('users')->get();
            }
            return response()->json(
                [
                    "success" => true,
                    "message" => "Here are the parties playing the selected game",
                    "data" => $users
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error getting users" 
                ],
                500
            );
        }
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
