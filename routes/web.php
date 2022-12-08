<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminActivityController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiyController;
use App\Http\Controllers\LectureController;
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
    Route::middleware('guest')->group(function (){
        Route::view('/login','user.login')->name('login');//登入表單
        Route::view('/register','user.register')->name('register');//註冊表單
        Route::post('/create',[UserController::class,'create'])->name('create');//建立頁面
        Route::post('/check',[UserController::class,'check'])->name('check');//登入會員首頁



    });

    Route::middleware('auth')->group(function (){
        Route::view('/index','user.index')->name('index');
    });

});
//Route::get('forget',[UserController::class,'forget'])->name('auth.passwords.email');//會員忘記密碼


//訂購
Route::prefix('order')->name('order.')->group(function () {
    Route::get('information',[OrderController::class,'information'])->name('activity_information');//活動詳情
    Route::get('check',[OrderController::class,'check'])->name('activity_check');//訂單確認
    Route::get('end',[OrderController::class,'end'])->name('activity_end');//發送票券
});
// 會員專區
//Route::prefix('personal')->name('personal.')->group(function () {
  //  Route::get('data',[PersonalController::class,'data'])->name('data');//個資
    //Route::get('ticket',[PersonalController::class,'ticket'])->name('ticket');//個人票券
    //Route::get('refund',[PersonalController::class,'refund'])->name('refund');//退票
//});

//會員
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/',[UserController::class,'userindex'])->name('dashboard.index');
});


//管理員
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminHomeController::class,'index'])->name('index');//主控台
    Route::prefix('activities')->name('activities.')->group(function () {
        Route::get('/',[AdminActivityController::class,'index'])->name('index');//活動列表
        Route::get('/create',[AdminActivityController::class,'create'])->name('create');//新增活動頁面
        Route::post('/',[AdminActivityController::class,'store'])->name('store');//儲存活動資料
        Route::get('/{id}/edit',[AdminActivityController::class,'edit'])->name('edit');//新增活動頁面
        Route::patch('/{id}',[AdminActivityController::class,'update'])->name('update');//儲存活動資料
        Route::delete('/{id}',[AdminActivityController::class,'delete'])->name('delete');//儲存活動資料

        Route::get('/image',[AdminActivityController::class,'test'])->name('image.test');//測試-上傳圖片
        Route::post('/image',[AdminActivityController::class,'image'])->name('image');//測試-儲存圖片
    });
    Route::get('/order',[AdminOrderController::class,'index'])->name('orders.index');//訂單列表
    Route::get('/account',[AdminAccountController::class,'index'])->name('account.index');//帳號列表
});
