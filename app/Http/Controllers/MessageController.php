<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function messages(User $user, Message $message)
    {
        $messages = $message->message($user->id);
        return view('message.messages', compact('user', 'messages'));
    }

    public function send(Request $request, User $user) : RedirectResponse
    {
        $attributes = $request->validate([
            'auth' => '',
            'receiver' => '',
            'body' => '',
            'thumbnail' => 'mimes:jpeg,jpg,png,gif',
        ]);

        $attributes['auth'] = auth()->id();
        $attributes['receiver'] = $user->id;

        Message::create($attributes);
        return back();
    }
}
