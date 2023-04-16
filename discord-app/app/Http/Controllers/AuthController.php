<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(Request $request)
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

    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::query()->where('email', $request['email'])->first();
   
        if (!$user) {
            return response(
                ["success" => false, "message" => "Email or password are invalid",],
                Response::HTTP_NOT_FOUND
            );
        }
    
        if (!Hash::check($request['password'], $user->password)) {
            return response(["success" => true, "message" => "Email or password are invalid"], Response::HTTP_NOT_FOUND);
        }

        $token = $user->createToken('apiToken')->plainTextToken;
        $res = [
            "success" => true,
            "message" => "User logged successfully",
            "token" => $token
        ];
        return response()->json(
            $res,
            Response::HTTP_ACCEPTED
        );
    } catch (\Throwable $th) {
        Log::error("Login error: " . $th->getMessage());
        return response()->json(
            [
                "success" => false,
                "message" => "Login error"
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
    }

    public function logout(Request $request)
{  try {
    $accessToken = $request->bearerToken();
 
    $token = PersonalAccessToken::findToken($accessToken);

    $token->delete();

    return response(
        [
            "success" => true,
            "message" => "Logout successfully"
        ],
        Response::HTTP_OK
    );
} catch (\Throwable $th) {
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

}



