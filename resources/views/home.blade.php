@extends('layouts.app')

@section('img')
    <img src="img/lime.png" alt="ライムのロゴ" style="width: 40px; height: 40px;">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <a href="/lime/public/lime/home" style="float: right;">ホームへ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
