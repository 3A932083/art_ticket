<?php

namespace App\Http\Controllers;


use App\Models\Activity;
use App\Models\Admin;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
    //編輯會員帳號頁面
    public function user_edit(User $user){
        $data=['user'=>$user];
        return view('admin.account.user_edit',$data);
    }
    //儲存修改的資料
    public function user_update(Request $request,User $user){

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'tel'=>$request->tel,
            'birthdate'=>$request->birthdate,
        ]);

        return redirect()->route('admin.account.index');
    }

    //新增會員頁面
    public function user_create(){
        return view('admin.account.user_create');
    }
    //儲存
    public function user_store(Request $request){
        //驗證資料
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:50'],
            'birthdate' => ['required', 'date'],
        ]);
        $user =new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->tel = $request->tel;
        $user->birthdate = $request->birthdate;
        $save = $user->save();

        $save = $user->save();
        if($save){
            $creds = $request->only('email','password');
            if(Auth::guard('admin')->attempt($creds)){
                return redirect()->route('admin.account.index');//正確
            }else{
                return redirect()->route('admin.account.index')->with('fail','信箱或密碼輸入錯誤.');//錯誤
            }
        }
    }

    //刪除會員
    public function user_destroy(User $user){
        $user->delete();
        return redirect()->route('admin.account.index');
    }



    //管理員
    //顯示管理員員帳號詳情頁面
    public function admin_show(Admin $admin){
        $data=['admin'=>$admin];
        return view('admin.account.admin_show',$data);
    }
    //編輯管理員帳號頁面
    public function admin_edit(Admin $admin){
        $data=['admin'=>$admin];
        return view('admin.account.admin_edit',$data);
    }
    //儲存修改的資料
    public function admin_update(Request $request,Admin $admin){

        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);

        return redirect()->route('admin.account.index');
    }

    //新增管理員頁面
    public function admin_create(){
        return view('admin.account.admin_create');
    }
    //儲存
    public function admin_store(Request $request){
        //驗證資料
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $admin =new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $save = $admin->save();
        if($save){
            $creds = $request->only('email','password');
            if(Auth::guard('admin')->attempt($creds)){
                return redirect()->route('admin.account.index');//正確
            }else{
                return redirect()->route('admin.account.index')->with('fail','信箱或密碼輸入錯誤.');//錯誤
            }
        }
    }

    //刪除管理員
    public function admin_destroy(Admin $admin){
        $admin->delete();
        return redirect()->route('admin.account.index');
    }


}
