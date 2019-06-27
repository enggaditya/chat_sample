<?php

namespace App\Observers;

use App\Chat;
use Auth;
use Illuminate\Support\Arr;

class ChatObserver
{
    /**
     * Handle the chat "created" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function created(Chat $chat)
    {
        //
    }

    /**
     * Handle the chat "creating" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function creating(Chat $chat)
    {   
        //encrypt message
        Arr::set($chat, 'message', encrypt(Arr::get($chat,'receiver_id')));
        //set receiver_id before saving a model
        Arr::set($chat,'receiver_id', Auth::id());
    }
    /**
     * Handle the chat "updated" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function updated(Chat $chat)
    {
        //
    }

    /**
     * Handle the chat "deleted" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function deleted(Chat $chat)
    {
        //
    }

    /**
     * Handle the chat "restored" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function restored(Chat $chat)
    {
        //
    }

    /**
     * Handle the chat "force deleted" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function forceDeleted(Chat $chat)
    {
        //
    }

    /**
     * Handle the chat "retrieved" event.
     *
     * @param  \App\Chat  $chat
     * @return void
     */
    public function retrieved(Chat $chat)
    {
        //
        dd(Arr::get($chat,'receiver_id'));
        dd($chat);
        Arr::set($chat, 'message', dercypt(Arr::get($chat,'receiver_id')));

    }
}
