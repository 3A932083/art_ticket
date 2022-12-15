@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">會員帳號詳情</li>
        </ol>
        <form action="{{route('admin.account.user.update',$user->id)}}" method="POST" role="form" class="row g-3">
            @method('patch')
            @csrf

            <label for="name" class="form-label fs-5" >編號：{{$user->id}}</label>

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
                    <input type="date" name="birthdate" id="birthdate" class="form-control fs-5" value="{{$user->birthdate}}">
                </div>
            </div>

            <div class="col-12">
                <label class="form-label fs-5">住址</label>
                <input type="text" name="address" id="address" class="form-control fs-5" value="{{$user->address}}" >
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button  class="btn btn-primary btn-sm fs-6" type="submit">儲存</button>
            </div>

        </form>

    </div>
@endsection
