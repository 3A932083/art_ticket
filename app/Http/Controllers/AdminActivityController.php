<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;  //在檔案開頭的namespace加上
use App\Models\Image;

class AdminActivityController extends Controller
{
    public function index()
    {
        return view('admin.activities.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function test()
    {
        return view('admin.image_test');
    }
    public function image( Request $request)
    {
        /*$request->validate([
            'item' => ['required', 'unique:items'],
            'image' => ['required', 'mimes:jpg,jpeg,bmp,png'],
        ]);
        $parameters = request()->all();
        if (request()->hasFile('image'))
        {
            // 檔案存在，所以存到project/storage/app/public，並拿到url，此範例會拿到public/fileName
            $imageURL = request()->file('image')->store('public');
            // 儲存純『檔名』到資料庫，因此把前面路徑修剪掉
            $parameters['image'] = substr($imageURL, 7);
        }
        $create = Image::create([
            'item' => $request['item'],
            'image' => $parameters['image'],
        ]);
        $result = $create->toArray();
        if ($parameters['image'] != null){
            $result['imageURL'] = asset('storage/' . $parameters['image']);
        }
        if ($create) {
            return response()->json($result, 200);
        }*/
        //驗證資料
        Validator::make($request->all(), [
            'image' => 'required|image',
        ])->validate();

        //確認有檔案的話儲存到資料夾
        if ($request->hasFile('image')) {
            //自訂檔案名稱
            $imageName = time().'.'.$request->file('image')->extension();
            //把檔案存到公開的資料夾
            $imageURL=$request->file('image')->move(public_path('/images'), $imageName);
        }
        Image::create([
            'image' => $imageName,
        ]);
        //回到傳送資料來的頁面
        return 'OKK?'.$imageURL;
    }
}
