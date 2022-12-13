@extends('admin.layouts.master')

@section('page-title', 'Edit activity')

@section('page-content')
<section class="container-fluid px-4">
    <h1 class="mt-4">活動管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">活動詳情</li>
    </ol>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-introduce-tab" data-bs-toggle="tab" data-bs-target="#nav-introduce" type="button" role="tab" aria-controls="nav-introduce" aria-selected="true">活動資訊</button>
            <button class="nav-link" id="nav-event-tab" data-bs-toggle="tab" data-bs-target="#nav-event" type="button" role="tab" aria-controls="nav-event" aria-selected="false">場次資訊</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-introduce" role="tabpanel" aria-labelledby="nav-introduce-tab">
            <div class="pt-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">活動名稱</label>
                    <!--回傳時會把name包裝成key，填入的內容包裝成value-->
                    <input name="name" id="name" type="text" class="form-control" value="{{$activity->name}}" disabled><!--單行輸入框-->
                </div>
                <div class="col-4 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">主辦單位/人</label>
                    <input name="organizer" id="organizer" type="text" class="form-control" value="{{$activity->organizer}}" disabled><!--單行輸入框-->
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">開始時間</label>
                        <input name="start_time" id="start_time" type="date" class="form-control" value="{{$activity->start_time}}" disabled>
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">結束時間</label>
                        <input name="end_time" id="end_time" type="date" class="form-control" value="{{$activity->end_time}}" disabled>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">活動地點</label>
                    <input name="place" id="place" type="text" class="form-control" value="{{$activity->place}}" disabled><!--單行輸入框-->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">活動介紹</label>
                    <textarea name="introduce" id="introduce" class="form-control" rows="10"  disabled>{{$activity->introduce}}</textarea><!--多行輸入框-->
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">注意事項</label>
                    <textarea name="precaution" id="precaution" class="form-control" rows="10" disabled>{{$activity->precaution}}</textarea><!--多行輸入框-->
                </div>
                <div class="md-3">
                    <label for="exampleFormControlTextarea1" class="form-label">活動圖片預覽</label>
                    <img src="/storage/images/{{$activity->img}}" class="form-control ">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{route('admin.activities.edit',$activity->id)}}" class="btn btn-primary btn-sm">編輯</a>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="nav-event" role="tabpanel" aria-labelledby="nav-event-tab">
            <div class="pt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@123">新增場次資訊</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                {{--標題--}}
                                <h5 class="modal-title" id="exampleModalLabel">時間</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">活動時間:</label>
                                        <input type="date" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">票券數量:</label>
                                        <input class="form-control" id="message-text" type="text">
                                    </div>
                                    <div class=" mb-3">
                                        <label for="message-text" class="col-form-label">票券價格:</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input class="form-control" id="message-text" type="text">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">時間</th>
                        <th scope="col">票價</th>
                        <th scope="col">功能</th>
                    </tr>
                    </thead>

                    <tbody>
                    {{--@foreach($activities as $activity)<!--activities陣列內有幾筆資料就會重複執行幾次-->
                    <tr>
                        <th scope="row" style="width: 50px">{{ $activity->id }}</th><!--印出資料表內的id欄位-->
                        <td>{{ $activity->name }}</td>
                        <td style="width: 150px">
                            <a href="{{route('admin.activities.show',$activity->id)}}" class="btn btn-primary btn-sm">詳細資料</a>

                            <form action="{{route('admin.activities.destroy',$activity->id)}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">刪除</button>
                            </form>


                        </td>
                    </tr>
                    @endforeach--}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
