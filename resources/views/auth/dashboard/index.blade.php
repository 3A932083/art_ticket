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
                                    <label class="string optional control-label" for="user_login">使用者名稱</label>
                                    <div class="controls"><input class="string optional col-12" type="text" value="1d_417" readonly name="user[login]" id="user_login" />
                                        <p class="help-block">您可以用此帳號登入AT，此名稱不可更改</p>
                                    </div>
                                </div>

                                <div class="control-group string optional user_nickname">
                                    <label class="string optional control-label" for="user_nickname">暱稱</label>
                                    <div class="controls"><input class="string optional col-12" type="text" value="" name="user[nickname]" id="user_nickname" />
                                        <p class="help-block">您的暱稱會顯示在個人頁面、活動頁面等地方</p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="string optional control-label">
                                        聯絡方式:
                                    </label>
                                    <div class="controls">
                                        <div class="control-group email optional user_email">
                                            <label class="email optional control-label" for="user_email">Email</label>
                                            <div class="controls"><input class="col-12" data-email-suggestion="你要用的是嗎?" type="email" value="b28203598@gmail.com" readonly name="user[email]" id="user_email" />
                                                <p class="help-block">您的 Email 已經認證完畢，不可更改。</p>
                                            </div>
                                        </div>

                                        <div ng-app="MobileVerificationApp" >
                                            <label class="string optional control-label" >
                                                手機號碼
                                            </label>
                                            <div class="controls">
                                                <input class="string optional datepicker" type="text" name="user[birthdate]" id="user_birthdate" />
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
                        <label class="select optional control-label" for="user_sex">生理性別</label>
                        <div class="controls">
                            <select class="select optional col-12" name="user[sex]" id="user_sex">
                                <option value="">
                                </option>
                                <option value="male">男</option>
                                <option value="female">女</option>
                            </select>
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
        222222222222

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
                    <label for="order" class="col-md-4 col-form-label text-md-end">{{ __('活動名稱：') }}</label>

                </div>

                <div class="row mb-3 px-4">
                    <label for="order" class="col-md-4 col-form-label text-md-end">{{ __('活動地點：') }}</label>

                </div>

                <div class="row mb-3 px-4">
                    <label for="order" class="col-md-4 col-form-label text-md-end">{{ __('活動場次：') }}</label>

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
                </section>>
            </form>
        </div>

    </div>
@endsection
