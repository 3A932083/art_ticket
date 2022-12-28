@extends('layouts.master')
@section('title','會員中心')
@section('content')


    <!--標籤列-->
    <div class="row justify-content-center py-5">
        <div style="width: 83%">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-data-tab" data-bs-toggle="tab" data-bs-target="#nav-data" type="button" role="tab" aria-controls="nav-data" aria-selected="true">個人資料</button>
                    <button class="nav-link" id="nav-ticket-tab" data-bs-toggle="tab" data-bs-target="#nav-ticket" type="button" role="tab" aria-controls="nav-ticket" aria-selected="false">個人票卷</button>
                    <button class="nav-link" id="nav-refund-tab" data-bs-toggle="tab" data-bs-target="#nav-refund" type="button" role="tab" aria-controls="nav-refund" aria-selected="false">退票申請</button>
                </div>
            </nav>
        </div>
    </div>

    <!--內容-->
    <div class="tab-content" id="nav-tabContent">

        <!--個人資料-->
        <div class="tab-pane fade show active" id="nav-data" role="tabpanel" aria-labelledby="nav-data-tab">

            <section class="pt-4">
                <div class="container px-lg-4">

                    <div class="row mb-3">
                        <div class="col-md-6 ">
                            <label class="form-label fs-5" >姓名</label>
                            <input name="name" id="name" type="text" class="form-control fs-5"  value="{{$user->name}}" disabled>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label fs-5" >Email</label>
                            <input type="email" name="email" id="email" class="form-control fs-5"  value="{{$user->email}}" disabled>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fs-5" >電話</label>
                            <input type="text" name="tel" id="tel" class="form-control fs-5" value="{{$user->tel}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fs-5" >生日</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control fs-5" value="{{$user->birthdate}}" disabled>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="form-label fs-5">住址</label>
                            <input type="text" name="address" id="address" class="form-control fs-5" value="{{$user->address}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fs-5" >密碼</label>
                            <input type="password" name="password" id="password" class="form-control fs-5" value="{{$user->password}}" disabled>
                        </div>
                    </div>

                    <p>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary btn-sm">編輯</a>
                    </div>

                    </p>

                </div>
            </section>
        </div>

        <!--個人票卷-->
        <div class="tab-pane fade" id="nav-ticket" role="tabpanel" aria-labelledby="nav-ticket-tab">

            <section class="pt-4">
                <div class="container px-lg-5">

                    <h2>我的票券</h2>
                    <div class="card mb-3" style="max-width: 100%;">
                        <div class="row g-0">


                            <div class="card mb-3" style="max-width:100%;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="../img/4.png" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">

                                            <h4 class="card-title">{{$activity->name}}</h4>
                                            <p class="card-text">{{$activity}}</p>
                                            <p class="card-text"><small class="text-muted">2022/2/22</small></p>

                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
            </section>

        </div>

        <!--退票申請-->
        <div class="tab-pane fade " id="nav-refund" role="tabpanel" aria-labelledby="nav-refund-tab">

            <form method="POST" action=" ">
                @csrf

                <section class="pt-4">
                        <div class="row mb-3 px-4">
                            <label for="order" class="col-md-4 col-form-label text-md-end">{{ __('訂單：') }}</label>
                            <div class="col-md-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>選擇訂單</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 px-4">
                            <label for="activityname" class="col-md-4 col-form-label text-md-end">{{ __('活動名稱：') }}</label>

                        </div>

                        <div class="row mb-3 px-4">
                            <label for="activityplace" class="col-md-4 col-form-label text-md-end">{{ __('活動地點：') }}</label>

                        </div>

                        <div class="row mb-3 px-4">
                            <label for="activitytime" class="col-md-4 col-form-label text-md-end">{{ __('活動場次：') }}</label>

                        </div>

                        <div class="row mb-3 px-4">
                            <label for="bank" class="col-md-4 col-form-label text-md-end">{{ __('退款銀行：') }}</label>
                            <div class="col-md-2">
                                <input id="bank" type="text" class="form-control" placeholder="請輸入退款銀行">
                            </div>
                        </div>

                        <div class="row mb-3 px-4">
                            <label for="bankaccount" class="col-md-4 col-form-label text-md-end">{{ __('銀行帳號：') }}</label>
                            <div class="col-md-2">
                                <input id="bankaccount" type="text" class="form-control"  placeholder="請輸入銀行帳號">
                            </div>
                        </div>

                        <div class="row mb-3 px-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('確定退票') }}
                                </button>
                            </div>
                        </div>
                </section>
            </form>
        </div>

    </div>
@endsection
