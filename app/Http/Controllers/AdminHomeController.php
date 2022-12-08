<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{
    //管理員控制台
    public function index(){
        return view('admin.index');
    }

    //管理員登入確認
    protected function check(Request $request){

        $creds=$request->only('email','password');

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.index');//正確
        }else{
            return redirect()->route('admin.login')->with('fail','信箱或密碼輸入錯誤.');//錯誤
        }
    }

    //管理員登出
    protected function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
