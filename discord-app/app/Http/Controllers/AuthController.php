<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'last_name' => 'string',
                'username' => 'required|unique:players',
                'email' => 'required|string|unique:players,email',
                'password' => 'required|string|min:6|max:12',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $player = Player::create([
                'name' => $request['name'],
                'last_name' => $request['last_name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ]);

            $token = $player->createToken('apiToken')->plainTextToken;

            $res = [
                "success" => true,
                "message" => "Player registered successfully",
                'data' => $player,
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
                    "message" => "Register error"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
