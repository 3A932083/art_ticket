<?php

use App\Http\Controllers\AdminAccountController;
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
Route::get('activity',[ActivityController::class,'activity'])->name('activity.activity');


//會員
Auth::routes();
Route::prefix('user')->name('user.')->group(function () {
    //登入前
    Route::middleware(['guest:web','PreventBackHistory'])->group(function (){
        Route::view('/login','user.login')->name('login');//登入表單
        Route::view('/register','user.register')->name('register');//註冊表單
        Route::view('/forget','user.passwords.forget')->name('forget');//忘記密碼表單
        Route::post('/create',[UserController::class,'create'])->name('create');//建立帳號
        Route::post('/check',[UserController::class,'check'])->name('check');//登入確認並登入會員首頁

    });
    //登入後
    Route::middleware(['auth:web','PreventBackHistory'])->group(function (){
        Route::get('/index',[UserController::class,'index'])->name('index');//會員中心
        Route::post('/logout',[UserController::class,'logout'])->name('logout');//登出
    });
});


//管理員
Route::prefix('admin')->name('admin.')->group(function () {
    //登入前
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        Route::view('/login','admin.login')->name('login');//登入表單
        Route::post('/check',[AdminHomeController::class,'check'])->name('check');//登入確認並登入管理員首頁
    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        Route::get('/index',[AdminHomeController::class,'index'])->name('index');//主控台
        Route::post('/logout',[AdminHomeController::class,'logout'])->name('logout');//登出
    });


    Route::prefix('activities')->name('activities.')->group(function () {
        Route::get('/',[AdminActivityController::class,'index'])->name('index');//活動列表
        Route::get('/create',[AdminActivityController::class,'create'])->name('create');//新增活動頁面
        Route::post('/',[AdminActivityController::class,'store'])->name('store');//儲存活動資料
        Route::get('/{id}/edit',[AdminActivityController::class,'edit'])->name('edit');//編輯活動頁面
        Route::patch('/{id}',[AdminActivityController::class,'update'])->name('update');//更新活動資料
        Route::delete('/{id}',[AdminActivityController::class,'destroy'])->name('destroy');//刪除活動資料

        Route::get('/image',[AdminActivityController::class,'test'])->name('image.test');//測試-上傳圖片
        Route::post('/image',[AdminActivityController::class,'image'])->name('image');//測試-儲存圖片
        Route::delete('/image',[AdminActivityController::class,'image_d'])->name('image.d');//測試-儲存圖片
    });
    Route::get('/order',[AdminOrderController::class,'index'])->name('orders.index');//訂單列表
    Route::get('/account',[AdminAccountController::class,'index'])->name('account.index');//帳號列表
});


//訂購
Route::prefix('order')->name('order.')->group(function () {
    Route::get('information',[OrderController::class,'information'])->name('activity_information');//活動詳情
    Route::get('check',[OrderController::class,'check'])->name('activity_check');//訂單確認
    Route::get('end',[OrderController::class,'end'])->name('activity_end');//發送票券
});
