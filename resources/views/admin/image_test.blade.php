<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('admin.activities.image')}}" method="post" enctype="multipart/form-data"><!--用post方法將表單內的資料傳送到路由admin.posts.store-->
        @method('post')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <input type="file" id="image" name="image" accept="image/*">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">儲存</button>
        </div>
    </form>
    <form action="{{route('admin.activities.image.d')}}" method="post" enctype="multipart/form-data"><!--用post方法將表單內的資料傳送到路由admin.posts.store-->
        @method('delete')
        <!--csrf驗證機制，產生隱藏的input，包含一組驗證密碼-->
        @csrf
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary btn-sm" type="submit">刪除</button>
        </div>
    </form>
    <img src="{{asset('atorage/images/1670675373.jpg')}}">
</body>
</html>
