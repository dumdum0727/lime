<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LimeController extends Controller
{
    // ホームのビューを返す
    public function index(Request $request)
    {
        $friends = Friend::all()->where('myId', Auth::id());
        $friendsList = [];
        foreach ($friends as $index => $friend) {
            $friendsList[$index] = User::all()->where('id', $friend->partnerId);
        }

        return view('lime.home', ['friendsList' => $friendsList]);
    }

    // 友達検索のビューを返す
    public function serch(Request $request)
    {
        return view('lime.serch');
    }
}
