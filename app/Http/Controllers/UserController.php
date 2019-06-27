<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    //
    public function __construct(){
    	$this-> successStatus = 200;
    }

    public function login(Request $request){
    	if(!Auth::attempt($request->only('email','password'))){ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
        $user = Auth::user();
        return response()->json(['success' => true, "api_token"=>$user->createToken('MyApp')-> accessToken],200); 
    }

    public function profile(){
        return response()->json(['success' => true, "data"=>Auth::user()], $this-> successStatus); 
    } 
}
