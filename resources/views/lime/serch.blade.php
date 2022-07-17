@extends('layouts.app')

@section('img')
    <img src="../img/lime.png" alt="ライムのロゴ" style="width: 40px; height: 40px;">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">友達登録</div>

                <div class="card-body">
                    <form method="POST" action="serch">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if (isset($friend))
                            <p style="text-align: center;">{{ $friend->name }} さんを友達登録しました！</p>
                            <p style="text-align: center"><a href="home">ホームへ</a></p>
                        @elseif (isset($message))
                            <p style="text-align: center; color: red;">{{ $message }}</p>
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
