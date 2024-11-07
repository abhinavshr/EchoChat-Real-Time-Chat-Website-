<?php

namespace App\Http\Controllers;


class Logincontroller extends Controller
{

    public function login(){
        return view('login');
    }

    public function broadcastChat(){
        event(new \App\Events\MessageSent('Abhinav', 'this is the first message using the controller'));
        return response()->json(['msg'=>'Event has been sent successfully']);
    }
}
