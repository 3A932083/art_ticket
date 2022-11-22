@extends('layouts.master')
@section('title','ArtHome')
@section('content')
@include('home.share.header')
<div>
    <!--標籤列-->
    <div class="row justify-content-center">
        <div style="width: 83%">
            <ul class="nav nav-tabs ">
                <li class="nav-item">
                    <a class="nav-link disabled" aria-current="page" href="#">最新</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.refer')}}">推薦</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Page Content-->
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
                            <a href="{{route('activity.activity')}}" class="stretched-link"></a>
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
@endsection
