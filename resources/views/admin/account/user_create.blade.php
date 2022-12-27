@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">新增會員帳號</li>
        </ol>
        <form action="{{route('admin.account.user.store')}}" method="POST" role="form" class="row g-3">
            @method('post')
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >姓名</label>
                    <!--記得name和id要寫才可以抓取填寫的資料-->
                    <input name="name" id="name" type="text" class="form-control fs-5 @error('name') is-invalid @enderror" autofocus placeholder="請輸入姓名">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >Email</label>
                    <input name="email" id="email" type="email" class="form-control fs-5 @error('email') is-invalid @enderror" placeholder="@gmail.com" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >密碼</label>
                    <input name="password" id="password" type="password" class="form-control fs-5 @error('password') is-invalid @enderror" placeholder="八位數以上" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >確認密碼</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control fs-5" autocomplete="new-password" placeholder="再輸入一次密碼" >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >電話</label>
                    <input name="tel" id="tel" type="text" class="form-control fs-5 @error('tel') is-invalid @enderror" autofocus placeholder="請輸入姓名">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >生日</label>
                    <input name="birthdate" id="birthdate" type="date" class="form-control fs-5 @error('birthdate') is-invalid @enderror" >
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fs-5">住址</label>
                <input type="text" name="address" id="address" class="form-control fs-5" >
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button  class="btn btn-primary btn-sm fs-6" type="submit">新增</button>
                <a class="btn btn-primary btn-sm fs-6" href="{{ route('admin.account.index') }}">{{ __('取消') }}</a>
            </div>

        </form>

    </div>
@endsection
