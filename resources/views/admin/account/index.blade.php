@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">帳號管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">帳號一覽表</li>
    </ol>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="#">新增</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">名稱</th>
            <th scope="col">功能</th>
        </tr>
        </thead>

        <tbody>
        {{--
          @foreach($posts as $post)<!--posts陣列內有幾筆資料就會重複執行幾次-->
            <tr>
                <th scope="row" style="width: 50px">{{ $post->id }}</th><!--印出資料表內的id欄位-->
                <td>{{ $post->title }}</td>
                <td style="width: 150px">
                    <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary btn-sm">編輯</a>
                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post" style="display: inline-block">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                    </form>

                </td>
            </tr>
        @endforeach
            --}}
        <!--標籤列-->
        <div class="row justify-content-center">
            <div >
                <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">會員</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">平台人員</a>
                    </li>
                </ul>
            </div>
        </div>
            <tr>
                <th scope="row" style="width: 50px">01</th>
                <td>王曉明</td>
                <td style="width: 150px">
                    <a href="#" type="button" class="btn btn-primary btn-sm">詳細資料</a>
                    <a href="#" type="button" class="btn btn-danger btn-sm">刪除</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endsection