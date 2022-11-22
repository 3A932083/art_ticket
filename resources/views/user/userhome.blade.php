@extends('layouts.master')
@section('title','會員')
@section('content')

<div>
    <!--標籤列-->
    <div class="row justify-content-center">
        <div style="width: 83%">
            <ul class="nav nav-tabs" id="mytab">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="1" href="#1">個人</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="2" href="#2">我的票卷</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="3" href="#3">歷史票卷</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Page Content-->
    <div class="tab-content" id="mytabcontent">
        <!--點擊個人後的頁面-->
        <div class="tab-pane fade show active " id="1">
            <div class="row justify-content-center py-5" method="post">
            <div class="col-3">
                <div>
                    <h5 class="py-1">姓氏：
                        <input id="username" type="text" data-fyll="pineapple" class="input fadeIn py-1">
                    </h5>
                </div>
                <div>
                    <h5 class="py-1">名字：
                        <input id="username" type="text" data-fyll="pineapple" class="input fadeIn py-1">
                    </h5>
                </div>
                <div >
                    <h5 class="py-1">帳號：
                        <input id="username" type="text" data-fyll="pineapple" class="input fadeIn py-1">
                    </h5>
                </div>
                <div >
                    <h5 class="py-1">密碼：
                        <input id="username" type="password" data-fyll="pineapple" class="input fadeIn py-1">
                    </h5>
                </div>

                <div class="mx-auto" style="width: 240px;">
                    <div class="px-lg-5"><button type="button" class="btn btn-secondary btn-lg">修改資料</button></div>
                </div>
            </div>
        </div>
    </div>

    </div>

</div>
@endsection
