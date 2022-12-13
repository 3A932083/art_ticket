<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccountController extends Controller
{

    public function index(){

        $users = User::orderBy('id', 'DESC')->get();//以陣列取得users資料表資料
        $admins = Admin::orderBy('id', 'DESC')->get();//以陣列取得admins資料表資料

        $data=['users'=>$users,'admins'=>$admins];
        return view('admin.account.index',$data);
    }

    public function user_destroy(User $user){
        $user->delete();//刪除會員
        return redirect()->route('admin.account.index');
    }

    public function admin_destroy(Admin $admin){
        $admin->delete();//刪除管理員
        return redirect()->route('admin.account.index');
    }

}
