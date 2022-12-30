@extends('admin.layouts.master')

@section('page-title', 'Create activity')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">活動管理</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">新增活動</li>
    </ol>

    <form action="{{route('admin.activities.store')}}" method="post"  enctype="multipart/form-data">
        @method('post')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">活動類別</label>
            <div class="ms-3 me-3">
                <div class="row">
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="category" id="category" value="1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">展覽</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="category" id="category" value="2">
                        <label class="form-check-label" for="flexRadioDefault2">體驗</label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="category" id="category" value="3">
                        <label class="form-check-label" for="flexRadioDefault2">講座</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">活動名稱</label>
            <!--回傳時會把name包裝成key，填入的內容包裝成value-->
            <input name="name" id="name" type="text" class="form-control" placeholder="請輸入活動名稱"><!--單行輸入框-->
        </div>
        <div class="col-4 mb-3">
            <label for="exampleFormControlInput1" class="form-label">主辦單位/人</label>
            <input name="organizer" id="organizer" type="text" class="form-control" placeholder="請輸入主辦單位/人"><!--單行輸入框-->
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label">開始時間</label>
                <input name="start_time" id="start_time" type="date" class="form-control">
            </div>

            <div class="col-6">
            <label for="exampleFormControlInput1" class="form-label">結束時間</label>
            <input name="end_time" id="end_time" type="date" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">活動地點</label>
            <input name="place" id="place" type="text" class="form-control" placeholder="請輸入活動地點"><!--單行輸入框-->
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">活動介紹</label>
            <textarea name="introduce" id="introduce" class="form-control" rows="10" placeholder="請輸入活動介紹"></textarea><!--多行輸入框-->
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">注意事項</label>
            <textarea name="precaution" id="precaution" class="form-control" rows="10" placeholder="請輸入注意事項"></textarea><!--多行輸入框-->
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">是否列為推薦</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_feature" id="is_feature" value="1">
                <label class="form-check-label" for="flexRadioDefault1">是</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_feature" id="is_feature" value="0" checked>
                <label class="form-check-label" for="flexRadioDefault2">否</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">活動圖片</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control">
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>

    </form>

</div>
@endsection
