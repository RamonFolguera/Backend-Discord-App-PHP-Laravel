<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Party;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function getAllPartiesByGameId(Request $request, $id)
    {
        try {
            Log::info("Get Party By GameId");
            $game = Game::find($id);
            
            if (!$game) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Game not found",
                    ],
                    404
                );
            }

            $gameId = $game->id;
            $parties = DB::table('parties')->where('game_id', '=', $gameId)->get();
    
            if ($parties->isEmpty()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "No parties found for this game",
                    ],
                    404
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Here are the parties playing the selected game",
                    "data" => $parties
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error getting parties",
                ],
                500
            );
        }
    }

    public function joinParty(Request $request)
    {
        try {
                Log::info("Join Party Working");
                $partyId = $request->input("party_id");
                $userId = auth()->user()->id;
                $user = User::find($userId);
                $party = Party::find($partyId);
                $party_userId = $party->users()->find($userId);
                if ($party_userId && $user) {
                    return response()->json([
                        'success' => true,
                        'message' => "This user is already in the party. Enjoy.",
                    ]);
                } else {
                        $joinParty = DB::table('party_user')->insert(
                            [
                                'party_id' => $partyId,
                                'user_id' => $userId
                            ]
                        );
                    
                        return response()->json([
                            "success" => true,
                            "message" => "You have succesfully joined the Party, enjoy!",
                            "data" => $joinParty
                    ], 200);
                }
            } catch (\Throwable $th) {
                Log::error("Join Party error: " . $th->getMessage());
                return response()->json(
                    [
                        "success" => false,
                        "message" => $th->getMessage() 
                    ],
                    500
        );
    }
}

public function leaveParty(Request $request)
{
    try {
        Log::info("Leave Party Working");
        $partyId = $request->input("party_id");
        $userId = auth()->user()->id;
        $user = User::find($userId);
        
        $party_userId = DB::table('party_user')->where([
            ['party_id', '=', $partyId],
            ['user_id', '=', $userId]
        ])->value('id');
        
        if ($party_userId && $user) {
            DB::table('party_user')->where('id','=', $party_userId)->delete();
            return response()->json([
                'success' => true,
                'message' => "This user has successfully left the party. Enjoy.",
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "Something went wrong",
            ], 200);
        }
    } catch (\Throwable $th) {
        Log::error("Leave Party error: " . $th->getMessage());
        return response()->json([
            "success" => false,
            "message" => $th->getMessage() 
        ], 500);
    }
}
}