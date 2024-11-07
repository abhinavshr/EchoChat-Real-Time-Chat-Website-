<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageSentController extends Controller
{
    public function broadcastChat(){
        event(new \App\Events\MessageSent('Abhinav', 'this is the first message using the controller'));
        return response()->json(['msg'=>'Event has been sent successfully']);
    }
}
