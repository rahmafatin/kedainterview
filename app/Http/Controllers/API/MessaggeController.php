<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class MessaggeController extends Controller
{
    //
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'receiver_id'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if(UserController::findUser($request->receiver_id) == NULL){
            return response()->json(['messagge' => 'Receiver unidentified'],404);
        }

        $message = Message::create([
            'title'     => $request->title,
            'body'      => $request->body,
            'sender_id' => Auth::id(),
            'receiver_id'=> $request->receiver_id

        ]);

        return response()->json([
            'message_sent'  => $message,
            'message'       => 'Message successfully delivered'  
        ],200);
    }

    public function getAllMessagges(){
        return response()->json([
            'mesagges'  => Message::all(),
            'message'   => 'Success'
        ],200);
    }

}
