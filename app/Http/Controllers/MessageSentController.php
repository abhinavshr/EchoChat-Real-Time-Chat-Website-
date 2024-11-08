<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MessageSentController extends Controller
{
    public function broadcastChat(Request $request){
        $request->validate([
            'username'=>'required',
            'message'=>'required',
        ]);
        event(new \App\Events\MessageSent($request->username, $request->message));
        return response()->json($request->all());
    }
}
