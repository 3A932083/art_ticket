<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiyController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ActivityController;

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
Route::get('refer',[HomeController::class,'index'])->name('home.refer');

//展覽
Route::get('show',[ActivityController::class,'show'])->name('home.show');

//體驗
Route::get('diy',[ActivityController::class,'diy'])->name('home.diy');

//講座
Route::get('lecture',[ActivityController::class,'lecture'])->name('home.lecture');

//活動頁面

