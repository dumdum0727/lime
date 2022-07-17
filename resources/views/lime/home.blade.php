@extends('layouts.app')

@section('style')
    <style>
        .friends-list {
            background: whitesmoke;
            padding: 0 0.5em;
            position: relative;
        }

        .friends-list .friend {
            line-height: 1.5;
            padding: 0.5em 0 0.5em 1.5em;
            border-bottom: 2px solid white;
            list-style-type: none!important;
        }

        .friends-list .friend:before {
            font-family: "Font Awesome 5 Free";
            content: "\f00c";/*アイコン種類*/
            position: absolute;
            left : 0.5em; /*左端からのアイコンまで*/
            color: #668ad8; /*アイコン色*/
        }

        .friends-list .friend:last-of-type {
            border-bottom: none;/*最後の線だけ消す*/
        }

        .submit {
            font-size: 20px;
            border: none;
            background-color: whitesmoke;
            border-bottom: 1px solid lightblue;
        }

        .submit:hover {
            background-color: lightgray;
        }

        .anker {
            color: black;
            font-size: 20px;
        }
    </style>
@endsection

@section('img')
    <img src="../img/lime.png" alt="ライムのロゴ" style="width: 40px; height: 40px;">
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">友達一覧</div>
                    <div class="card-body">
                        <ul class="friends-list">
                            @foreach ($friendsList as $friends)
                                @foreach ($friends as $friend)
                                    <li class="friend">
                                        <a href="talk?id={{ $friend->id }}&name={{ $friend->name }}" class="anker">{{ $friend->name }}</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
