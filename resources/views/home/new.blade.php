@extends('layouts.master')
@section('title','ArtHome')
@section('content')
@include('home.share.header')


    <!--標籤列-->
    <div class="row justify-content-center">
        <div style="width: 83%">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-new-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new" aria-selected="true">最新</button>
            <button class="nav-link" id="nav-refer-tab" data-bs-toggle="tab" data-bs-target="#nav-refer" type="button" role="tab" aria-controls="nav-refer" aria-selected="false">推薦</button>
        </div>
    </nav>
        </div>
    </div>

    <!--內容-->
    <div class="tab-content" id="nav-tabContent">
        <!--最新-->
       <!--activities陣列內有幾筆資料就會重複執行幾次-->
        <div class="tab-pane fade show active" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
                <section class="pt-4">
                    <div class="container px-lg-5">
                        <!-- Page Features-->
                        <div class="row gx-lg-5">
                            @foreach($activities as $activity)
                                <div class="col-lg-6 col-xxl-4 mb-5">
                                    <div class="card bg-light border-0 h-100">
                                        <!--圖片-->
                                        <img src="{{asset('images/'.$activity->img)}}">
                                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                            <h2 class="fs-4 fw-bold">{{$activity->name}}</h2>
                                            <p class="mb-0">{{$activity->introduce}}</p>
                                            <a href="{{route('activity.activity',$activity->id)}}" class="stretched-link"></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
        </div>

        <!--推薦-->
        <div class="tab-pane fade" id="nav-refer" role="tabpanel" aria-labelledby="nav-refer-tab">
                <section class="pt-4">
                    <div class="container px-lg-5">
                        <!-- Page Features-->
                        <div class="row gx-lg-5">
                            <a href="#"></a>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title1</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title2</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title3</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title4</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title5</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-4 mb-5">
                                <div class="card bg-light border-0 h-100">
                                    <!--圖片-->
                                    <img src ="../img/1.png ">
                                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">

                                        <h2 class="fs-4 fw-bold">title6</h2>
                                        <p class="mb-0">content123456</p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        </div>

    </div>



@endsection
