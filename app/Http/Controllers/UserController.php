<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //會員中心
    public function index(){
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //建立帳號
        //驗證資料
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:50'],
            'birthdate' => ['required', 'date'],
        ]);
    }

    protected function create(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'tel' => $request['tel'],
            'birthdate' => $request['birthdate'],
        ]);
        //確認註冊帳號，並直接跳轉至會員中心頁面
        $creds=$request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.index');//正確
        }else{
            return redirect()->route('user.register')->with('fail','信箱或密碼輸入錯誤.');//錯誤
        }
    }

    //使用者登入確認
    protected function check(Request $request){
        $creds=$request->only('email','password');

        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('user.index');//正確
        }else{
            return redirect()->route('user.login')->with('fail','信箱或密碼輸入錯誤.');//錯誤
        }
    }

    //使用者登出
    protected function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

    //忘記密碼表單
    protected function forgot(){
        return view('user.passwords.forgot');
    }

    //重設密碼連結
    protected function sendLink(Request $request){
       $request->validate([
           'email' => ['required','email','exists:users,email'],
       ]);

       $token =Str::random(64);
       DB::table('password_resets')->insert([
          'email'=>$request->email,
          'token'=>$token,
          'created_at'=>Carbon::now(),
       ]);

     $action=route('user.passwords.reset.form',['token'=>$token,'email'=>$request->email]);
     $body="已傳送連結至".$request->email."，您可以點選以下連結重設密碼";

     Mail::send('user.passwords.email',['action'=>$action,'body'=>$body],function($message) use ($request){
         $message->from('jenny0977133813@gmail.com','AT.');
         $message->to($request->email)->subject('Reset Password');
    });
         return back()->with('success','已傳送密碼重設連結至您的email.');//成功訊息
    }

    //重設密碼頁面
    protected function resetForm(Request $request, $token =null){
        return view('user.passwords.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    //重設密碼至資料庫
    protected function resetPassword(Request $request){
        //抓取重設的密碼資料
        $request->validate([
            'email' => ['required','email','exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
        //在password_resets資料表中抓取重設密碼的email
        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail','抓取失敗');
        }else{
            //更新users資料表中與該mail符合的密碼
            User::where('email',$request->email)->update([
                'password'=>Hash::make($request->password)
            ]);
            DB::table('password_resets')->where([
               'email'=>$request->email
            ])->delete();

            return redirect()->route('user.login')->with('info','您的密碼已重設，請重新登入.');//成功訊息
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
