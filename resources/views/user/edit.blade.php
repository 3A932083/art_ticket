@extends('layouts.master')
@section('title','會員中心')
@section('content')

<form action="{{route('user.update',$user->id)}}" method="POST" role="form" class="row g-3">
    @method('patch')
    @csrf

    <section class="pt-4">
        <div class="container px-lg-4">
            <div class="row mb-3">
                <div class="col-md-6 ">
                    <label class="form-label fs-5" >姓名</label>
                    <input name="name" id="name" type="text" class="form-control fs-5"  value="{{$user->name}}" >
                </div>

                <div class="col-md-6 ">
                    <label class="form-label fs-5" >Email</label>
                    <input type="email" name="email" id="email" class="form-control fs-5"  value="{{$user->email}}" >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fs-5" >電話</label>
                    <input type="text" name="tel" id="tel" class="form-control fs-5" value="{{$user->tel}}" >
                </div>
                <div class="col-md-6">
                    <label class="form-label fs-5" >生日</label>
                    <input type="date" name="birthdate" id="birthdate" class="form-control fs-5" value="{{$user->birthdate}}" >
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fs-5">住址</label>
                <input type="text" name="address" id="address" class="form-control fs-5" value="{{$user->address}}" >
            </div>

            <p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary btn-sm" type="submit">確認</button>
            </div>
            </p>

        </div>
    </section>
</form>

@endsection

