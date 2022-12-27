@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">管理員帳號詳情</li>
        </ol>

            <label for="name" class="form-label fs-5" >編號：{{$admin->id}}</label>

        <div class="row mb-3">
            <div class="col-md-6 fs-4">
                <label class="form-label fs-5" >姓名</label>
                <!--記得name和id要寫-->
                <input name="name" id="name" type="text" class="form-control fs-5"  value="{{$admin->name}}" disabled>
            </div>

            <div class="col-md-6 fs-4">
                <label class="form-label fs-5" >Email</label>
                <input name="email" id="email" type="email" class="form-control fs-5"  value="{{$admin->email}}" disabled>
            </div>
        </div>

        <div class="col-md-6 fs-4">
            <label class="form-label fs-5" >密碼</label>
            <input name="password" id="password" type="password" class="form-control fs-5"  value="{{$admin->password}}" disabled>
        </div>

        <div class="d-grid gap-2 pt-3 d-md-flex justify-content-md-end">
            <a href="{{route('admin.account.admin.edit',$admin->id)}}" class="btn btn-primary btn-sm fs-6">編輯</a>
            <a class="btn btn-primary btn-sm fs-6" href="{{ route('admin.account.index') }}">{{ __('取消') }}</a>
        </div>


        </form>

    </div>
@endsection
