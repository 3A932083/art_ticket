<?php

use App\Http\Controllers\AdminActivityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiyController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PersonalController;

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

//管理員
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/',[AdminActivityController::class,'index'])->name('posts.index');//活動列表
});
