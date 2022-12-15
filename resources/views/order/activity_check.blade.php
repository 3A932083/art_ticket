@extends('layouts.master')
@section('title','活動名稱')
@section('content')
    <!-- Page Content-->

    <p>
    <div class="row justify-content-center">
        <div style="width: 80%">
            <h1 ><<確認訂購>></h1>
        </div>
    </div>
        </p>
        <section class="py-5">
        <div class="container px-5 my-5 ">
            <div class="row gx-5">

                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width:50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                </div>
                    <!-- 購票流程 Step progress bar:END -->
                    <!-- Post title-->

                <!-- start: seat Map -->
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">購物車內容</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>活動名稱</td>
                        <td>活動日期</td>
                        <td>活動時間</td>
                        <td>票券數量</td>
                        <td>價格</td>
                    </tr>
                    <tr>
                        <th scope="row">{{$activity->name}}</th>
                        <td>{{$activity->start_time}}</td>
                        <td>5:20</td>
                        <td>x1</td>
                        <td>800</td>
                    </tr>
                    <tr>
                    <thead>
                        <th scope="row">總計</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>800</td>
                    </thead>
                    </tr>
                    </tbody>
                </table>


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"> 付款資訊</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <div style="margin-bottom:20px">
                            <th scope="row">持卡人姓名<input type="password" class="form-control"  placeholder="持卡人姓名"></th>

                        </div>


                    </tr>
                    <tr>
                        <th scope="row">信用卡號<input type="password" class="form-control" placeholder="xxxx-xxxx-xxxx-xxxx"></th>

                    </tr>
                    <tr>
                        <th scope="row">有效期限<input type="password" class="form-control"  placeholder=""></th>

                    </tr>
                    <th scope="row">手機號碼 <input type="password" class="form-control"  placeholder=""></th>

                    </tr>
                    </tbody>
                </table>

                <div class="col-xs-12 col-md-3 d-md-flex">
                    <a href="{{route('order.activity_end',1)}}" class="btn btn-secondary fs justify-content-md-end-5 position-end " >下一步</a>
                </div>
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <hr>
                            <div class="accordion" id="accordionExample">
                            </div>
            </div>
    </section>

@endsection
