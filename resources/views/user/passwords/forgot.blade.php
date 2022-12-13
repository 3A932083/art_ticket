@extends('layouts.master')
@section('title','忘記密碼')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-5">


                <!--成功訊息-->
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('忘記密碼') }}</div>
                    <div class="card-body">
                        <form method="Post" action="{{ route('user.passwords.send.link')}}">
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

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('傳送重設連結') }}
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
