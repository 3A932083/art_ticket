@extends('layouts.master')
@section('title','活動名稱')
@section('content')
    <!-- Page Content-->
    <section class="py-5">
        <h1 class="align-bottom">確認訂購</h1>
        <div class="container px-5 my-5 ">
            <div class="row gx-5">
                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                </div>
                    <!-- 購票流程 Step progress bar:END -->
                <br>
                <br>
                    <!-- Post title-->
                <div class="row">
                    <div class="col-sm-12">
                        <h1 align="center"><span id="ctl00_ContentPlaceHolder1_NAME" class="title">活動名稱</span></h1>
                        <p>
                        <div class="alert alert-danger alert-dismissible fade in" style="margin:0 2em;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        </div>

                        <!-- Post header-->
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">活動日期date</th>

                            <th scope="col">地點place</th>

                            <th scope="col">票價price</th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>活動日期1</td>
                            <td>地點1</td>
                            <td>票價1</td>

                        </tr>
                    </table>
                        <div class="col-xs-12 col-md-3 d-md-flex">
                            <a href="{{route('activity.activity_check')}}" class="btn btn-secondary fs justify-content-md-end-5 position-end " >下一步</a>
                        </div>
                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <hr>
                            <div class="accordion" id="accordionExample">

    </section>

@endsection
