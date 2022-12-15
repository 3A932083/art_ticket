@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">管理員帳號詳情</li>
        </ol>

        <form action="{{route('admin.account.admin.update',$admin->id)}}" method="POST" role="form" class="row g-3">
            @method('patch')
            @csrf

            <div class="row mb-3">
                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >姓名</label>
                    <!--記得name和id要寫-->
                    <input name="name" id="name" type="text" class="form-control fs-5"  value="{{$admin->name}}">
                </div>

                <div class="col-md-6 fs-4">
                    <label class="form-label fs-5" >Email</label>
                    <input name="email" id="email" type="email" class="form-control fs-5"  value="{{$admin->email}}" >
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary btn-sm fs-6" type="submit">儲存</button>
            </div>


        </form>

    </div>
@endsection
