@extends('layouts.master')
@section('title','體驗')
@section('content')

    <!--體驗之頁面-->
<div>


    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="row gx-lg-5">
                @foreach($activities as $activity)
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-light border-0 h-100">
                            <!--圖片-->
                            <img src ="{{asset('images/'.$activity->img)}}">
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
@endsection
