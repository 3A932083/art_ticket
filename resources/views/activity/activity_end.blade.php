@extends('layouts.master')
@section('title','活動名稱')
@section('content')
    <!-- Page Content-->
    <section class="py-5">
        <h1 class="align-bottom">完成訂購</h1>
        <div class="container px-5 my-5 ">
            <div class="row gx-5">
                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width:100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                </div>
                    <!-- 購票流程 Step progress bar:END -->
                    <!-- Post title-->
                <h1 class="align-bottom">以下是您的票券:</h1>
                <img src ="../img/1.png ">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                    <div class="col-xs-12 col-md-3 d-md-flex">
                        <a href="{{route('home.new')}}" class="btn btn-secondary fs justify-content-md-end-5 position-end " >回首頁</a>
                    </div>
                    </header>
                    <!-- Post content-->
                    <section class="mb-5">
                        <hr>
                        <div class="accordion" id="accordionExample">

    </section>

@endsection
