@extends('layouts.master')
@section('title','活動名稱')
@section('content')
    <!-- Page Content-->
    <section class="py-5">
        <div class="container px-5 my-5 ">
            <div class="row gx-5">
                <div >
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                                <div class="row align-items-center">
                                    <div class="col-xs-12 col-md-9">
                                        <!-- Post title-->
                                        <h1 class="fw-bolder mb-1 ">{{$activity->name}}</h1>
                                    </div>
                                    <div class="col-xs-12 col-md-3 d-md-flex">
                                        <a href="{{route('order.activity_information',1)}}" class="btn btn-secondary fs justify-content-md-end-5 position-end " >立即訂購</a>
                                    </div>
                                </div>

                        </header>
                        <!-- Post content-->
                        <section class="mb-5">
                            <hr>
                            <div class="accordion" id="accordionExample">
                                <!--活動資訊-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            活動資訊
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-5">
                                            <strong>{{$activity->introduce}}</strong>
                                        </div>
                                    </div>
                                </div>
                                <!--購票方式-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button  collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                            購票方式
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-5">
                                            <strong>小標題</strong> 內容
                                        </div>
                                    </div>
                                </div>
                                <!--退票方式-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button  collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                            退票方式
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-5">
                                            <strong></strong> 內容
                                        </div>
                                    </div>
                                </div>
                                <!--注意事項-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button  collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                            注意事項
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-5">
                                            <strong>{{$activity->precaution}}</strong>
                                        </div>
                                    </div>
                                </div>
                                <!--場次列表-->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button  collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                                            場次列表
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body fs-5">
                                            <div class="container">
                                                <table class="table caption-top table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>活動日期</th>
                                                            <th>票價</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($events as $event)
                                                        <tr>
                                                            <th>{{$event->time}}</th>
                                                            <th>{{$event->price}}</th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>

                </div>
            </div>
        </div>
    </section>

@endsection
