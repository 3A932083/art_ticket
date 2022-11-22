<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiyController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ShowController;

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
Route::get('show',[ShowController::class,'index'])->name('home.show');

//體驗
Route::get('diy',[DiyController::class,'index'])->name('home.diy');

//講座
Route::get('lecture',[LectureController::class,'index'])->name('home.lecture');

