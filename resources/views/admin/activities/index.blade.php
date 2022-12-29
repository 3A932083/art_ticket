@extends('admin.layouts.master')

@section('page-title', 'Article list')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">活動管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">活動一覽表</li>
    </ol>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{route('admin.activities.create')}}">新增</a>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-show-tab" data-bs-toggle="tab" data-bs-target="#nav-show" type="button" role="tab" aria-controls="nav-show" aria-selected="true">展覽</button>
            <button class="nav-link" id="nav-diy-tab" data-bs-toggle="tab" data-bs-target="#nav-diy" type="button" role="tab" aria-controls="nav-diy" aria-selected="false">體驗</button>
            <button class="nav-link" id="nav-lecture-tab" data-bs-toggle="tab" data-bs-target="#nav-lecture" type="button" role="tab" aria-controls="nav-lecture" aria-selected="false">講座</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!--展覽-->
        <div class="tab-pane fade show active" id="nav-show" role="tabpanel" aria-labelledby="nav-show-tab">
            <div class="pt-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">活動名稱</th>
                        <th scope="col">推薦</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($activities_show as $activity)<!--activities陣列內有幾筆資料就會重複執行幾次-->
                    <tr>
                        <th scope="row" style="width: 50px">{{ $activity->id }}</th><!--印出資料表內的id欄位-->
                        <td>{{ $activity->name }}</td>
                        @if($activity->is_feature == 1)
                            <td>是</td>
                        @else
                            <td>否</td>
                        @endif
                        <td style="width: 150px">
                            <a href="{{route('admin.activities.show',$activity->id)}}" class="btn btn-primary btn-sm">詳細資料</a>

                            <form action="{{route('admin.activities.destroy',$activity->id)}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--體驗-->
        <div class="tab-pane fade" id="nav-diy" role="tabpanel" aria-labelledby="nav-diy-tab">
            <div class="pt-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">活動名稱</th>
                        <th scope="col">推薦</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($activities_diy as $activity)<!--activities陣列內有幾筆資料就會重複執行幾次-->
                    <tr>
                        <th scope="row" style="width: 50px">{{ $activity->id }}</th><!--印出資料表內的id欄位-->
                        <td>{{ $activity->name }}</td>
                        @if($activity->is_feature == 1)
                            <td>是</td>
                        @else
                            <td>否</td>
                        @endif
                        <td style="width: 150px">
                            <a href="{{route('admin.activities.show',$activity->id)}}" class="btn btn-primary btn-sm">詳細資料</a>

                            <form action="{{route('admin.activities.destroy',$activity->id)}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--講座-->
        <div class="tab-pane fade" id="nav-lecture" role="tabpanel" aria-labelledby="nav-lecture-tab">
            <div class="pt-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">活動名稱</th>
                        <th scope="col">推薦</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($activities_lecture as $activity)<!--activities陣列內有幾筆資料就會重複執行幾次-->
                    <tr>
                        <th scope="row" style="width: 50px">{{ $activity->id }}</th><!--印出資料表內的id欄位-->
                        <td>{{ $activity->name }}</td>
                        @if($activity->is_feature == 1)
                            <td>是</td>
                        @else
                            <td>否</td>
                        @endif
                        <td style="width: 150px">
                            <a href="{{route('admin.activities.show',$activity->id)}}" class="btn btn-primary btn-sm">詳細資料</a>

                            <form action="{{route('admin.activities.destroy',$activity->id)}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
