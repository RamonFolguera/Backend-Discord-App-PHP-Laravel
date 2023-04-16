<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{

    public function createMessage(Request $request)
    {
        try {
            Log::info("Create Messages working");
        
            $validator = Validator::make($request->all(), [
                'message' => 'required | string',
                'party_id' => 'integer'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
            $partyId = $request->input("party_id");
            $userId = auth()->user()->id;
            $message = $request->input('message');
            
            $newMessage = new Message();
            $newMessage->party_id = $partyId;
            $newMessage->user_id = $userId;
            $newMessage->message = $message;
            $newMessage->save();

            return response()->json(
                [
                    "success" => true,
                    "message" => "Party created",
                    "data" => $newMessage
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error getting messages" . $newMessage
                ],
                500
            );
        }
    }



    public function getAllMessagesByPartyId(Request $request, $id)
    {
        try {
            Log::info("Get Messages working");

            $userId = auth()->user()->id;
            $party = Party::find($id);
            
            if (!$party) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Party not found",
                    ],
                    404
                );
            }

            $partyId = $party->id;
            $messageId = DB::table('messages')->where([
                ['party_id', '=', $partyId],
                ['user_id', '=', $userId]
            ])->value('id');
            $messages = DB::table('messages')->where('id', '=', $messageId)->get();

            
            if ($messages->isEmpty()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "No messsages found for this party",
                    ],
                    404
                );
            }

            return response()->json(
                [
                    "success" => true,
                    "message" => "Here are the messages for the selected party",
                    "data" => $messages
                ],
                200
            );
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error getting messages" 
                ],
                500
            );
        }
    }

    public function updateMessageById(Request $request, $id)
    {
        try {
            Log::info("Update Messages working");

            $validator = Validator::make($request->all(), [
                'message' => 'required | string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $userId = auth()->user()->id;
            $party = Party::find($id);
            
            if (!$party) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Party not found",
                    ],
                    404
                );
            }

            $message = $request->input('message');

            $partyId = $party->id;
            $messageId = DB::table('messages')->where([
                ['party_id', '=', $partyId],
                ['user_id', '=', $userId]
            ])->value('id');
            $updatedMessage = DB::table('messages')->where('id', '=', $messageId)->update([
                'message' =>  $message
            ]);

            if ($updatedMessage > 0) {
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Message updated for the selected party",
                        "data" => $updatedMessage
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "No messages updated for this party",
                    ],
                    404
                );
            }
            
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error updating messages" 
                ],
                500
            );
        }
    }

    public function deleteMessageById(Request $request, $id)
    {
        
        try {
            Log::info("Delete Messages working");

            $userId = auth()->user()->id;
            $message = Message::find($id);
            
            if ($userId === $message->user_id) {
                Message::where('id', '=', $id)->delete();
                return response()->json(
                    [
                        "success" => true,
                        "message" => "Message successfully deleted for the selected party",
                    ],
                    200
                );
            } else {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "No messages deleted for this party. You can only delete your messages, sorry.",
                    ],
                    404
                );
            }
            
        } catch (\Throwable $th) {
            Log::error("CREATING PARTY: " . $th->getMessage());
            return response()->json(
                [
                    "success" => false,
                    "message" => "error deleting messages" 
                ],
                500
            );
        }
    }

}
