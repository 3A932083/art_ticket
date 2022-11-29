<?php

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
Route::get('userhome',[UserController::class,'userhome'])->name('auth.home');
//會員忘記密碼
Route::get('forget',[UserController::class,'forget'])->name('auth.passwords.email');
//會員重設密碼





//test view
Route::get('test',function (){
    return view('auth.passwords.email');
});
