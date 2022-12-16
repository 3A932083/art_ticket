@extends('admin.layouts.master')

@section('page-title', '帳號管理')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">帳號管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">帳號一覽表</li>
    </ol>

        <!--標籤列-->
        <div class="row justify-content-center">
            <div >
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-user-tab" data-bs-toggle="tab" data-bs-target="#nav-user" type="button" role="tab" aria-controls="nav-user" aria-selected="true">會員</button>
                        <button class="nav-link" id="nav-admin-tab" data-bs-toggle="tab" data-bs-target="#nav-admin" type="button" role="tab" aria-controls="nav-admin" aria-selected="false">平台人員</button>
                    </div>
                </nav>
            </div>
        </div>


        <!--內容-->
    <div class="tab-content" id="nav-tabContent">
        <!--會員-->
        <div class="tab-pane fade show active" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <section class="pt-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{route('admin.account.user.create')}}">新增</a>
            </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>


                    <tbody>

                    @foreach($users as $user)
                            <tr>
                                <th scope="row" style="width: 50px">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td style="width: 150px">
                                    <a href="{{route('admin.account.user.show',$user->id)}}" type="button" class="btn btn-primary btn-sm">詳細資料</a>

                                    <!--刪除-->
                                    <form action="{{route('admin.account.user.destroy',$user->id)}}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach

                    </tbody>
                </table>

            </section>
        </div>

        <!--管理員-->
        <div class="tab-pane fade" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
            <section class="pt-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{route('admin.account.admin.create')}}">新增</a>
            </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($admins as $admin)
                            <tr>
                                <th scope="row" style="width: 50px">{{ $admin->id }}</th>
                                <td>{{ $admin->name }}</td>
                                <td style="width: 150px">
                                    <a href="{{route('admin.account.admin.show',$admin->id)}}" type="button" class="btn btn-primary btn-sm">詳細資料</a>

                                    <!--刪除-->
                                    <form action="{{route('admin.account.admin.destroy',$admin->id)}}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger" type="submit">刪除</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

            </section>
        </div>



</div>
</div>
@endsection
