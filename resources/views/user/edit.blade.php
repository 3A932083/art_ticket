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
                <div class="container px-lg-5">
                    <h2>修改帳號設定</h2>
                    <div class="simple_form edit_user" id="edit_user" novalidate="novalidate" enctype="multipart/form-data" action="https://kktix.com/users" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="_method" value="patch" /><input type="hidden" name="authenticity_token" value="pAfW6vofv3dQImyr/kgN8flzXCvGmGxjRNnUgVRZUfXjIqK9L1y6V3wErLOKhIqt0RW+AboqLSs55cLYo1pQBg==" />
                        <div class="clearfix">
                            <div class="col-8 form-horizontal">
                                <div class="control-group string optional user_login">
                                    <label class="string optional control-label" for="user_login">使用者姓名</label>
                                    <div class="controls"><input class="string optional col-12" type="text" value="{{$user->name}}" name="user[login]" id="user_login" />
                                        <p class="help-block"></p>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="string optional control-label">
                                        聯絡方式:
                                    </label>
                                    <div class="controls">
                                        <div class="control-group email optional user_email">
                                            <label class="email optional control-label" for="user_email">Email</label>
                                            <div class="controls"><input class="col-12" data-email-suggestion="你要用的是嗎?" type="email" value="{{$user->email}}" readonly name="user[email]" id="user_email" />
                                                <p class="help-block">您的 Email 已經認證完畢，不可更改。</p>
                                            </div>
                                        </div>

                                            <div class="controls">
                                                <div class="control-group email optional user_email">
                                                    <label class="email optional control-label" for="user_email">地址</label>
                                                    <div class="controls"><input class="col-12" data-email-suggestion="" type="email" value="{{$user->address}}" id="user_email" />
                                                        <p class="help-block"></p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div ng-app="MobileVerificationApp" >
                                            <label class="string optional control-label" >
                                                手機號碼
                                            </label>
                                            <div class="controls">
                                                <input class="string optional datepicker" type="text" name="{{$user->address}}" id="user_birthdate" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="control-group string optional user_birthdate"><label class="string optional control-label" for="user_birthdate">出生年月日</label>
                        <div class="controls">
                            <input class="string optional datepicker" type="text" name="user[birthdate]" id="user_birthdate" />
                        </div>
                    </div>
                    <div class="control-group select optional user_sex">

                        <div class="controls">

                        </div>
                    </div>
                    <p>
                        <div class="col-xs-12 col-md-3 d-md-flex">
                            <a class="btn btn-secondary fs justify-content-md-end-5 position-end " >儲存</a>

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
                                            <h4 class="card-title">【全民通識課 免費講座】「藥」健康如何補充營養</h4>
                                            <p class="card-text">你曉得如何健康用藥嗎？
                                                重視健康的現代人不可不知， 有些藥物、中草藥、食品與保健營養品會產生交互作用。歡迎來純青認識藥品&保健營養品的相關知識。</p>
                                            <p class="card-text"><small class="text-muted">2022/2/22</small></p>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="../img/4.png" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h4 class="card-title">【免費講座】居家空間萬用收納術</h4>
                                                <p class="card-text">家是每個人的避風港 隨著經年累月的堆積，空間塞滿東西越來越亂 透過專業的居家整聊師講解，教你如何有效整理收納 純青與你一同找回家庭的美好環境</p>
                                                <p class="card-text"><small class="text-muted">2022/12/25</small></p>
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
