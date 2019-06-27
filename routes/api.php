<?php

use Illuminate\Http\Request;
use App\Http\Resources\ChatCollection;
use App\Chat;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'UserController@login');

Route::middleware('auth:api')->prefix('/user/')->group(function(){
	Route::get('profile', function(Request $request){
    	return response()->json(['success' => true, "data"=>Auth::user()],200);
	});
	//Route::get('profile', 'UserController@profile');
});

Route::middleware('auth:api')->prefix('/chat/')->group(function(){
	Route::post('store', 'ChatController@store');
	Route::get('messages', function () {
    	return new ChatCollection(Chat::where('receiver_id',Auth::id())->paginate(Config::get('chat.message_per_page')));
	});
	//Route::get('allMessages', 'ChatController@getMessages');
});
