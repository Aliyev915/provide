<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SettingConroller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'signIn']);
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'signUp']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::prefix('admin')->group(function(){
    Route::get('/',function(){
        return view('manage.index');
    })->name('admin');

    Route::get('/setting',[SettingConroller::class,'index'])->name('setting');
    Route::post('/setting',[SettingConroller::class,'save']);

    Route::prefix('faq')->group(function(){
        Route::get('/',[FaqController::class,'index'])->name('faqs');
        Route::get('/create',[FaqController::class,'create'])->name('create-faq');
        Route::post('/create',[FaqController::class,'store']);
        Route::get('/edit/{id}',[FaqController::class,'edit'])->name('edit-faq');
        Route::post('/edit/{id}',[FaqController::class,'update']);
        Route::get('/delete/{id}',[FaqController::class,'delete'])->name('delete-faq');
    });

    Route::prefix('partner')->group(function(){
        Route::get('/',[PartnerController::class,'index'])->name('partners');
        Route::get('/create',[PartnerController::class,'create'])->name('create-partner');
        Route::post('/create',[PartnerController::class,'store']);
        Route::get('/delete/{id}',[PartnerController::class,'delete'])->name('delete-partner');
    });
});