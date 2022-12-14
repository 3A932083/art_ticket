<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;  //在檔案開頭的namespace加上
use App\Models\Image;
use App\Models\Activity;
use function GuzzleHttp\Promise\all;

class AdminActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('id', 'DESC')->get();//取得資料庫中的欄位值，以陣列的方式
        $activities_show=Activity::where('category','=',1)->orderBy('id','DESC')->get();
        $activities_diy=Activity::where('category','=',2)->orderBy('id','DESC')->get();
        $activities_lecture=Activity::where('category','=',3)->orderBy('id','DESC')->get();
        $data=[
            'activities'=>$activities,
            'activities_show'=>$activities_show,
            'activities_diy'=>$activities_diy,
            'activities_lecture'=>$activities_lecture,
        ];

        return view('admin.activities.index',$data);
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        //驗證資料
        Validator::make($request->all(), [
            'image' => 'required|image',
        ])->validate();

        //確認有檔案的話儲存到資料夾
        if ($request->hasFile('image')) {
            echo 'UUU';
            //自訂檔案名稱
            $imageName = time().'.'.$request->file('image')->extension();
            //把檔案存到公開的資料夾
            $request->file('image')->move(public_path('/images'), $imageName);
            //$imageURL=$request->file('image')->storeAs('images',$imageName);
        }
        //將檔案名稱存至DB
        Activity::create([
            'name'=>$request->name,
            'category'=>$request->category,
            'organizer'=>$request->organizer,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'place'=>$request->place,
            'introduce'=>$request->introduce,
            'precaution'=>$request->precaution,
            'is_feature'=>$request->is_feature,
            'img'=>$imageName,

        ]);
        //回到傳送資料來的頁面
        return redirect()->route('admin.activities.index');

    }

    public function show(Activity $activity)
    {
        $events=Event::where('activity_id','=',$activity->id)->orderby('time')->get();
        $data=[
            'activity'=>$activity,
            'events'=>$events,
        ];
        return view('admin.activities.show',$data);
    }

    public function edit(Activity $activity)
    {
        $data=[
            'activity'=>$activity,
        ];
        return view('admin.activities.edit',$data);
    }

    public function update(Request $request, Activity $activity)
    {
        //確認有檔案的話儲存到資料夾
        if ($request->hasFile('image')) {
            echo 'OKK';
            //刪除原本的檔案
            //Storage::delete($activity->img);
            //取格硬碟實例
            $disk=Storage::disk('images');
            //刪除指定檔案
            $disk->delete($activity->img);
            //自訂檔案名稱
            $imageName = time().'.'.$request->file('image')->extension();
            //把檔案存到公開的資料夾
            $request->file('image')->move(public_path('/images'), $imageName);
            //$imageURL=$request->file('image')->storeAs('images',$imageName);

        }else{
            //如果沒有上傳新檔案抓取原檔案的路徑
            $imageName=$activity->img;
            echo "NOO";
        }
        $activity->update([
            'name'=>$request->name,
            'category'=>$request->category,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'place'=>$request->place,
            'introduce'=>$request->introduce,
            'organizer'=>$request->organizer,
            'precaution'=>$request->precaution,
            'is_feature'=>$request->is_feature,
            'img'=>$imageName,
        ]);
        return redirect()->route('admin.activities.index');
    }

    public function destroy(Activity $activity)
    {
        //取格硬碟實例
        $disk=Storage::disk('images');
        //刪除指定檔案
        $disk->delete($activity->img);
        //Storage::delete('public/images/8FHnGNrUTHMSk7d7TaDCJdjnNcQaM2nvejKgIFOp.jpg');
        Activity::destroy($activity->id);
        return redirect()->route('admin.activities.index');
    }
    public function test()
    {
        return view('admin.image_test');
    }
    public function image( Request $request)
    {
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
            //$imageURL=$request->file('image')->storeAs('public/images',$imageName);
            //$url=Storage::url($imageURL);
        }
        //將檔案名稱存至DB
        Image::create([
            'image' => $imageURL,
        ]);
        //回到傳送資料來的頁面
        return 'OKK?'.$url;
    }
    public function image_d()
    {
        $delete=Image::find(9);
        Storage::delete($delete->image);
        Image::destroy($delete->id);
        return 'OKK';
    }
    public function delete(){
        return "?Q?Q?Q";
    }
}
