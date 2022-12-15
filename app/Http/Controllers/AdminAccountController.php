<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminAccountController extends Controller
{

    //會員、管理員列表
    public function index(){
        $users = User::orderBy('id', 'DESC')->get();//以陣列取得users資料表資料
        $admins = Admin::orderBy('id', 'DESC')->get();//以陣列取得admins資料表資料

        $data=['users'=>$users,'admins'=>$admins];
        return view('admin.account.index',$data);
    }

    //會員
    //顯示會員帳號詳情頁面
    public function user_show(User $user){
        $data=['user'=>$user];
        return view('admin.account.user_show',$data);
    }
    //刪除會員
    public function user_destroy(User $user){
        $user->delete();
        return redirect()->route('admin.account.index');
    }

    //管理員
    //顯示管理員帳號詳情頁面
    public function admin_show(Admin $admin){
        $data=['admin'=>$admin];
        return view('admin.account.admin_show',$data);
    }
    //儲存修改的資料
    public function admin_update(Request $request,Admin $admin){

        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('admin.account.index');
    }


    //刪除管理員
    public function admin_destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admin.account.index');
    }


}
