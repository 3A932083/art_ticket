@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">帳號管理</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">管理員帳號詳情</li>
        </ol>

        <form action="/admin/admin/{{$admin->id}}" method="GET" role="form" class="row g-3">
            @method('get')
            @csrf

            <label for="name" class="form-label fs-5" >編號：{{old('id',$admin->id)}}</label>

            <div class="col-md-6 fs-4">
                <label class="form-label fs-5" >姓名</label>
                <input type="text" disabled="disabled" class="form-control fs-5"  value="{{old('name',$admin->name)}}">
            </div>

            <div class="col-md-6 fs-4">
                <label class="form-label fs-5" >Email</label>
                <input type="email" disabled="disabled" class="form-control fs-5"  value="{{old('email',$admin->email)}}">
            </div>



        </form>

    </div>
@endsection
