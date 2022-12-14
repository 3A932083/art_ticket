<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    //會員中心
    public function index()
    {

        $user=Auth::user();//目前使用者資料
        //$orders = Order::orderBy('id', 'DESC')->get();
        $array=array();
        $count=0;
        $orders=Order::where('user_id','=',$user->id)->get();
        foreach ($orders as $order){
            $events=$order->event()->get();
            foreach ($events as $event){
                $activities=$event->activity()->get();
                foreach ($activities as $activity){
                    $array=Arr::add($array,$count,[
                        'order_id'=>$order->id,
                        'order_status'=>$order->status,
                        'event_id'=>$event->id,
                        'event_time'=>$event->time,
                        'event_price'=>$event->price,
                        'activity_id'=>$activity->id,
                        'activity_name'=>$activity->name,
                        'activity_img'=>$activity->img,
                    ]);
                    $count++;
                }
            }
        }
        $data = [
            'user' => $user,
            'array'=>$array,
        ];
       // return $event;
       return view('user.index',$data);
    }

    //編輯會員頁面
    public function edit(User $user){
        $data=['user'=>$user];
        return view('user.edit',$data);
    }
    //儲存修改的個資
    public function update(Request $request,User $user){

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'tel'=>$request->tel,
            'birthdate'=>$request->birthdate,
            'password'=>Hash::make($request->password),
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */

    protected function create(Request $request)
    {
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

        //確認註冊帳號，並直接跳轉至首面
        if($save){
            $creds = $request->only('email','password');
            if(Auth::guard('web')->attempt($creds)){
                return redirect()->route('home.new');//正確
            }else{
                return redirect()->route('user.login')->with('fail','信箱或密碼輸入錯誤.');//錯誤
            }
        }
    }

    //使用者登入確認
    protected function check(Request $request){
        $request->validate( [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required',  'min:8'],
        ]);

        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect()->route('home.new');//正確
        }else{
            return redirect()->route('user.login')->with('fail','信箱或密碼輸入錯誤.');//錯誤
        }
    }

    //使用者登出
    protected function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');}


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

    public function refund(Request $request,Order $order)
    {

        $user=Auth::user();
        $order->update([
            'event_id'=>$order->event_id,
            'user_id'=>$user->id,
            'status'=>1,
        ]);

    return redirect()->route('user.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



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
