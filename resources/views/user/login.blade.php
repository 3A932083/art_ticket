@extends('layouts.master')
@section('title','登入')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">

            <!--查無此帳號-->
            @if (Session::get('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            <!--重設密碼成功訊息-->
            @if (Session::get('info'))
                <div class="alert alert-info">
                    {{Session::get('info')}}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('登入') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.check') }}">
                        @method('post')
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('密碼') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('記住我') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登入') }}
                                </button>

                                @if (Route::has('user.passwords.forgot'))
                                    <a class="btn btn-link" href="{{ route('user.passwords.forgot') }}">
                                        {{ __('忘記密碼?') }}
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
