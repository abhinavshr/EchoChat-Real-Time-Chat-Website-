<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logincontroller extends Controller
{

    public function login(){
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'username'=>'required',
        ]);
        $username = $request->username;

        return view('chat')->with(['name'=>$username]);
    }

    // public function handleLogin(Request $request)
    // {
    //     $request->validate([
    //         'username'=>'required',
    //     ]);
    //     $username = $request->username;

    //     return view('chat')->with(['name'=>$username]);
    // }

    public function broadcastChat(Request $request){
        $request->validate([
            'username'=>'required',
            'message'=>'required',
        ]);
        event(new \App\Events\MessageSent($request->username, $request->message));
        return response()->json($request->all());
    }
}
