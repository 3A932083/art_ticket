<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('home/new');
})->name('home.new');

//推薦
Route::get('refer', function (){
   return view('home/refer');
})->name('home.refer');

//展覽
Route::get('show', function (){
    return view('home/show');
})->name('home.show');

//體驗
Route::get('diy', function (){
    return view('home/diy');
})->name('home.diy');

//講座
Route::get('lecture', function (){
    return view('home/lecture');
})->name('home.lecture');
