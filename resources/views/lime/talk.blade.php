@extends('layouts.app')

@section('style')
    <style>
        .talk-area {
            margin: 0 auto 0;
            width: 70%;
            min-height: 150px;
        }

        form {
            text-align: center;
        }

        .m-form-text {
            height: 2.4em;
            width: 70%;
            padding: 0 16px;
            border-radius: 4px;
            border: none;
            box-shadow: 0 0 0 1px #ccc inset;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .m-form-text:focus {
            outline: 0;
            box-shadow: 0 0 0 2px rgb(33, 150, 243) inset;
        }

        .button {
            border: none;
            background-color: lightblue;
            padding: 5px 10px 5px;
            border: 1px solid gray;
        }

        .button:hover {
            opacity: .8;
        }

        .hidden {
            display: none;
        }

        .message {
            margin-bottom: 0;
        }

        .send-message {
            text-align: right;
        }

        .info {
            font-size: 10px;
            color: gray;
            margin-bottom: 0;
        }

        .created-at {
            margin-bottom: 10px;
        }

        /*以下、①背景色など*/
        .line-bc {
            padding: 20px 10px;
            max-width: 450px;
            margin: 15px auto;
            text-align: right;
            font-size: 14px;
            background: #7da4cd;
        }

        /*以下、②左側のコメント*/
            .balloon6 {
            width: 100%;
            margin: 10px 0;
            overflow: hidden;
        }

        .balloon6 .faceicon {
            float: left;
            margin-right: -50px;
            width: 40px;
        }

        .balloon6 .faceicon img{
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .balloon6 .chatting {
            width: 100%;
            text-align: left;
        }

        .says {
            display: inline-block;
            position: relative;
            margin: 0;
            padding: 5px;
            max-width: 250px;
            border-radius: 12px;
            background: #edf1ee;
        }

        .says:after {
            content: "";
            display: inline-block;
            position: absolute;
            top: 3px;
            left: -19px;
            border: 8px solid transparent;
            border-right: 18px solid #edf1ee;
            -webkit-transform: rotate(35deg);
            transform: rotate(35deg);
        }

        .says p {
            margin: 0;
            padding: 0;
        }

        /*以下、③右側の緑コメント*/
        .mycomment {
            text-align: right;
        }

        .mycomment p {
            display: inline-block;
            position: relative;
            padding: 5px;
            max-width: 250px;
            border-radius: 12px;
            background: #edf1ee;
            font-size: 15px:
        }

        .mycomment p:after {
            content: "";
            position: absolute;
            top: 3px;
            right: -19px;
            border: 8px solid transparent;
            border-left: 18px solid #edf1ee;
            -webkit-transform: rotate(-35deg);
            transform: rotate(-35deg);
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
                <div class="card-header">{{ $name }}</div>
                <div class="card-body">
                    <div class="talk-area">
                        @foreach ($messages as $message)
                            @if ($message->sendId == Auth::id() && $message->receptionId == $id)
                                <div class="mycomment">
                                    <p class="send-message message">{{ $message->message }}</p>
                                </div>
                                <p class="send-message info">＠{{ Auth::user()->name }}</p>
                                <p class="send-message info created-at">{{ $message->created_at }}</p>
                            @elseif ($message->sendId == $id && $message->receptionId == Auth::id())
                                <div class="chatting">
                                    <div class="says">
                                        <p class="message">{{ $message->message }}</p>
                                    </div>
                                </div>
                                <p class="info">＠{{ $name }}</p>
                                <p class="info created-at">{{ $message->created_at }}</p>
                            @endif
                        @endforeach
                    </div>
                    <form action="send" method="post">
                        @csrf
                        <input type="text" name="text" value="{{ old('text') }}" class="m-form-text">
                        <input type="number" name="id" value="{{ $id }}" class="hidden">
                        <input type="text" name="name" value="{{ $name }}" class="hidden">
                        <input type="submit" value="送信" class="button">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
