@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">會員帳號詳情</li>
        </ol>

            <label for="name" class="form-label fs-5" >編號：{{$user->id}}</label>

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

        <div class="col-12">
            <label class="form-label fs-5">住址</label>
            <input type="text" name="address" id="address" class="form-control fs-5" value="{{$user->address}}" disabled>
        </div>

            <div class="d-grid gap-2 pt-3 d-md-flex justify-content-md-end">
                <a href="{{route('admin.account.user.edit',$user->id)}}" class="btn btn-primary btn-sm fs-6">編輯</a>
            </div>

        </form>

    </div>
@endsection
