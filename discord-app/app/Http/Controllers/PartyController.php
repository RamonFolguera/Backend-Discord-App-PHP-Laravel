<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
    public function createParty(Request $request)
    {
        try {
            Log::info("Create Party");

            $validator = Validator::make($request->all(), [
                'name' => 'required | regex:/^[A-Za-z0-9]+$/',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $gameId = $request->input('game_id');
            // $userId = auth()->user()->id;
            $name = $request->input('name');
            
            $newParty = new Party();
            $newParty->game_id = $gameId;
            $newParty->name = $name;
            // $newParty->user_id = $userId;
            $newParty->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Party created",
                    "data" => $newParty
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error creating party",
                ],
                500
            );
        }
    }
}
