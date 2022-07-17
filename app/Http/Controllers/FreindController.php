<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class FreindController extends Controller
{
    // 友達登録する
    public function register(Request $request)
    {
        if ($request->email != Auth::user()->email) {
            $friend = User::where('email', $request->email)->first();
            
            if (isEmpty($friend)) {
                return view('lime.serch', ['message' => '入力したアドレスのユーザーが見つかりませんでした。']);
            }

            $newFriend = new Friend;
            $newFriend->myId = Auth::id();
            $newFriend->partnerId = $friend->id;
            $newFriend->save();

            return view('lime.serch', ['friend' => $friend]);
        } else {
            return view('lime.serch', ['message' => 'このメールアドレスはあなた自身のものです。']);
        }
    }
}
