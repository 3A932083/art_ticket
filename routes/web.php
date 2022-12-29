<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminActivityController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首頁
Route::get('/',[HomeController::class,'index'])->name('home.new');

//展覽
Route::get('show',[ActivityController::class,'show'])->name('activity.show');
//體驗
Route::get('diy',[ActivityController::class,'diy'])->name('activity.diy');
//講座
Route::get('lecture',[ActivityController::class,'lecture'])->name('activity.lecture');
//活動頁面(選擇性路由
Route::get('activity/{activity}',[ActivityController::class,'activity'])->name('activity.activity');

//會員
Auth::routes();
Route::prefix('user')->name('user.')->group(function () {
    //登入前
    Route::middleware(['guest:web','PreventBackHistory'])->group(function (){
        Route::view('/login','user.login')->name('login');//登入表單
        Route::view('/register','user.register')->name('register');//註冊表單
        Route::post('/create',[UserController::class,'create'])->name('create');//建立帳號
        Route::post('/check',[UserController::class,'check'])->name('check');//登入確認並登入會員首頁

        Route::get('/passwords/forgot',[UserController::class,'forgot'])->name('passwords.forgot');//忘記密碼表單
        Route::post('/passwords/forgot',[UserController::class,'sendLink'])->name('passwords.send.link');//發送重設密碼連結
        Route::get('/passwords/reset/{token}',[UserController::class,'resetForm'])->name('passwords.reset.form');//重設密碼頁面
        Route::post('/passwords/reset',[UserController::class,'resetPassword'])->name('reset.password');//將重設密碼更新置資料庫

    });
    //登入後
    Route::middleware(['auth:web','PreventBackHistory'])->group(function (){
        Route::get('/index',[UserController::class,'index'])->name('index');//會員中心
        Route::post('/logout',[UserController::class,'logout'])->name('logout');//登出
        Route::get('/{user}/edit', [UserController::class,'edit'])->name("edit");//修改會員資料頁面
        Route::patch('/{user}', [UserController::class,'update'])->name("update");//更新會員資料

    });
});


//管理員
Route::prefix('admin')->name('admin.')->group(function () {
    //登入前可執行的動作
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login','admin.login')->name('login');//登入表單
        Route::post('/check',[AdminHomeController::class,'check'])->name('check');//登入確認並登入管理員首頁
    });

    //登入後可執行的動作
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        Route::get('/index',[AdminHomeController::class,'index'])->name('index');//主控台
        Route::post('/logout',[AdminHomeController::class,'logout'])->name('logout');//登出

        //帳號管理
        Route::prefix('account')->name('account.')->group(function () {
            Route::get('/',[AdminAccountController::class,'index'])->name('index');//帳號列表
            //會員
            Route::get('/user/{user}/show', [AdminAccountController::class,'user_show'])->name("user.show");//會員詳情頁面
            Route::get('/user/{user}/edit', [AdminAccountController::class,'user_edit'])->name("user.edit");//會員編輯頁面
            Route::patch('/user/{user}', [AdminAccountController::class,'user_update'])->name("user.update");//更新會員資料
            Route::get('/user/create', [AdminAccountController::class, 'user_create'])->name("user.create");//新增管理員頁面
            Route::post('/user/store', [AdminAccountController::class, 'user_store'])->name("user.store");//存取管理員資料
            Route::delete('/user/{user}', [AdminAccountController::class, 'user_destroy'])->name('user.destroy');//刪除會員

            //管理員
            Route::get('/admin/{admin}/show', [AdminAccountController::class,'admin_show'])->name("admin.show");//管理員詳情頁面
            Route::get('/admin/{admin}/edit', [AdminAccountController::class,'admin_edit'])->name("admin.edit");//管理員編輯頁面
            Route::patch('/admin/{admin}', [AdminAccountController::class,'admin_update'])->name("admin.update");//更新管理員資料
            Route::get('/admin/create', [AdminAccountController::class, 'admin_create'])->name("admin.create");//新增管理員頁面
            Route::post('/admin/store', [AdminAccountController::class, 'admin_store'])->name("admin.store");//存取管理員資料
            Route::delete('/admin/{admin}', [AdminAccountController::class, 'admin_destroy'])->name('admin.destroy');//刪除管理員
    });



    });


    //活動
    Route::prefix('activities')->name('activities.')->group(function () {
        Route::get('/',[AdminActivityController::class,'index'])->name('index');//活動列表
        Route::get('/{activity}/show',[AdminActivityController::class,'show'])->name('show');//活動詳情
        Route::get('/create',[AdminActivityController::class,'create'])->name('create');//新增活動頁面
        Route::post('/',[AdminActivityController::class,'store'])->name('store');//儲存活動資料
        Route::get('/{activity}/edit',[AdminActivityController::class,'edit'])->name('edit');//編輯活動頁面
        Route::patch('/{activity}',[AdminActivityController::class,'update'])->name('update');//更新活動資料
        Route::delete('/{activity}',[AdminActivityController::class,'destroy'])->name('destroy');//刪除活動資料
        Route::post('/events',[AdminEventController::class,'store'])->name('events.store');//儲存場次資訊
        Route::delete('/events/{event}',[AdminEventController::class,'destroy'])->name('events.destroy');//儲存場次資訊

        Route::get('/image',[AdminActivityController::class,'test'])->name('image.test');//測試-上傳圖片
        Route::post('/image',[AdminActivityController::class,'image'])->name('image');//測試-儲存圖片
        Route::delete('/image',[AdminActivityController::class,'image_d'])->name('image.d');//測試-儲存圖片
        Route::get('/test',function (){
           $faker=\Faker\Factory::create();
            $start_time=$faker->date('y-m-d');
            do{
                $end_time=$faker->date('y-m-d');
            }while($start_time>$end_time);
            echo $start_time.' & '.$end_time;
            echo $start_time-$end_time;
        });
    });
    Route::get('/order',[AdminOrderController::class,'index'])->name('orders.index');//訂單列表

});


//訂購
Route::prefix('order')->name('order.')->group(function () {
    Route::get('information/{activity}',[OrderController::class,'information'])->name('activity_information');//活動詳情

    Route::get('check/{event}',[OrderController::class,'check'])->name('activity_check');//訂單確認
    Route::get('end/{activity}',[OrderController::class,'end'])->name('activity_end');//發送票券
    Route::post('/store', [OrderController::class, 'store'])->name('store');

});


