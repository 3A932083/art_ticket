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
{{--                    <button class="nav-link" id="nav-refund-tab" data-bs-toggle="tab" data-bs-target="#nav-refund" type="button" role="tab" aria-controls="nav-refund" aria-selected="false">退票區</button>--}}
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

            <div class="container px-lg-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">活動名稱</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    @foreach($array as $array_item)
                    <tbody>
                    <tr>
                        <th scope="row" style="width: 50px">{{$array_item['order_id']}}</th>
                        <td>{{$array_item['activity_name']}}</td><!--活動名稱-->
                        <td style="width: 150px">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#order{{$array_item['order_id']}}" data-bs-whatever="@123">詳情</button>
                            <div class="modal fade" id="order{{$array_item['order_id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!--標題-->
                                            <h5 class="modal-title" id="more">詳情</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post" >
                                            @method('post')
                                            <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
                                            @csrf
                                            <div class="modal-body">
                                                <input id="activity_id" name="activity_id" type="hidden" value="">
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">活動名稱:</label>
                                                    <h1>{{$array_item['activity_name']}}</h1>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">場次日期:</label>
                                                    <h1>{{$array_item['event_time']}}</h1>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">票價:</label>
                                                    <h1> <h1>{{$array_item['event_price']}}</h1></h1>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">票券:</label>
                                                    <img src="../img/7.png" width="300" height="300">
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            <div class="modal-footer">

                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>

                            @if($array_item['order_status']==0)
                            <button type="button" id="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#refund" data-bs-whatever="@123" >退票</button>
                            <div class="modal fade" id="refund" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('user.refund',$array_item['order_id'])}}" method="post" >
                                    @method('patch')
                                    <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
                                    @csrf

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <!--標題-->
                                            <h5 class="modal-title" id="exampleModalLabel">退票</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">
                                                <input id="activity_id" name="activity_id" type="hidden" value="">
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">銀行帳號:</label>
                                                    <input type="text" class="form-control" id="count" name="count">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">連絡電話:</label>
                                                    <input type="text" class="form-control" id="count" name="count">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary refund">確定</button>
                                            </div>

                                        @elseif($array_item['order_status']==1)
                                                <label for="message-text" class="col-form-label">審核中</label>
                                        @else
                                            <label for="message-text" class="col-form-label">退票成功</label>
                                            @endif
                                    </div>
                                </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

@endsection
