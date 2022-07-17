<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tag;
use Illuminate\Support\Facades\DB;

class TalkController extends Controller
{
    // トーク画面に飛ぶ
    public function talk(Request $request)
    {
        $messages = Message::all()->where('sendId', Auth::id() || $request->id)->where('receptionId', $request->id || Auth::id());

        return view('lime.talk', ['messages' => $messages, 'id' => $request->id, 'name' => $request->name]);
    }

    // トーク送信
    public function send(Request $request)
    {

        $validator = $request->validate([
            'text' => 'required',
        ]);

        $message = new Message;
        $message->sendId = Auth::id();
        $message->receptionId = $request['id'];
        $message->message = $request['text'];
        $message->save();

        $messages = Message::all()->where('sendId', Auth::id() || $request->id)->where('receptionId', $request->id || Auth::id());

        return view('lime.talk', ['messages' => $messages, 'id' => $request['id'], 'name' => $request['name']]);
    }
}
