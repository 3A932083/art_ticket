<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminActivityController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiyController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;

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

//首頁(最新)
Route::get('/',[HomeController::class,'index'])->name('home.new');
//推薦
Route::get('refer',[HomeController::class,'refer'])->name('home.refer');
//展覽
Route::get('show',[ActivityController::class,'show'])->name('activity.show');
//體驗
Route::get('diy',[ActivityController::class,'diy'])->name('activity.diy');
//講座
Route::get('lecture',[ActivityController::class,'lecture'])->name('activity.lecture');
//活動頁面(選擇性路由
Route::get('activity',[ActivityController::class,'activity'])->name('activity.activity');

//會員首頁
Auth::routes();
//還未使用
Route::get('userhome',[UserController::class,'userhome'])->name('auth.home');
//會員忘記密碼
Route::get('forget',[UserController::class,'forget'])->name('auth.passwords.email');


//活動詳情
Route::get('activity_information',[ActivityController::class,'activity_information'])->name('activity.activity_information');
//訂單確認
Route::get('activity_check',[ActivityController::class,'activity_check'])->name('activity.activity_check');
//發送票券
Route::get('activity_end',[ActivityController::class,'activity_end'])->name('activity.activity_end');
//管理員
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminHomeController::class,'index'])->name('index');//主控台
    Route::prefix('activities')->name('activities.')->group(function () {
        Route::get('/',[AdminActivityController::class,'index'])->name('index');//活動列表
        Route::get('/image',[AdminActivityController::class,'test'])->name('image.test');
        Route::post('/image',[AdminActivityController::class,'image'])->name('image');//儲存圖片
    });
    Route::get('/order',[AdminOrderController::class,'index'])->name('orders.index');//訂單列表
    Route::get('/account',[AdminAccountController::class,'index'])->name('account.index');//帳號列表
});
