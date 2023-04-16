<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

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

    public function myProfile()
    {
        try {
        $userId = auth()->user()->id;
        $profile = DB::table('users')->where('id', '=', $userId)->get();

        return response(
            [
                "success" => true,
                "message" => "Your profile has been succesfully retrieved.",
                "data" => $profile
            ],
            Response::HTTP_OK
        );
    }   catch (\Throwable $th) {
    Log::error("Logout error: " . $th->getMessage());

    return response()->json(
        [
            "success" => false,
            "message" => "Profile error"
        ],
        Response::HTTP_INTERNAL_SERVER_ERROR
    );
}
}

public function updateMyProfile(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'last_name' => 'string',
            'username' => 'required|unique:users',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6|max:12',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            "success" => true,
            "message" => "User registered successfully",
            'data' => $user,
            "token" => $token
        ];

        return response()->json(
            $res,
            Response::HTTP_CREATED
        );
    } catch (\Throwable $th) {
        Log::error("Register error: " . $th->getMessage());

        return response()->json(
            [
                "success" => false,
                "message" => "Register error",
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}


}
