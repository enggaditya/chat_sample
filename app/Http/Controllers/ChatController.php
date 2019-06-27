<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\User;
use App\Chat;
use Config;
use App\Http\Resources\ChatCollection;



class ChatController extends Controller
{
    protected function store(Request $request){
        $input = $request->only('sender_id','message');

        //check user exists or not
        if (!Auth::user())
            return response()->json(['success'=>false, 'message'=>'Either token is missing or user invalid.'],500);

        //user cannot send message to himself/herself (sender & recevier id must not be same)
        if (Auth::id() == $input['sender_id'])
            return response()->json(['success'=>false, 'message'=>'You cannot send message to yourself.'],500);

        //recevier_id & message text is encrypted in ChatObserver
        if(Chat::create($input)->id)
            return response()->json(['success'=>true, 'message'=>'Message send successfully!.'],201);
    }

    protected function getMessages(Request $request){

        //check user exists or not
        if (!Auth::user())
            return response()->json(['success'=>false, 'message'=>'Either token is missing or user invalid.'],500);

    	return new ChatCollection(Chat::where('receiver_id',Auth::id())->paginate(Config::get('chat.message_per_page')));
    }


}
