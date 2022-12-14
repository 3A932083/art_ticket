@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">主控台</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">主控台</li>
    </ol>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="#"></a>
    </div>
    {{--
      <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">活動名稱</th>
            <th scope="col">功能</th>
        </tr>
        </thead>

        <tbody>
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
        </tbody>
    </table>
      --}}


</div>
@endsection
