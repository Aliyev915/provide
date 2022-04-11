<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SettingConroller;
use App\Http\Controllers\TestimotionalController;
use App\Http\Controllers\VacancyController;
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

    Route::prefix('imotional')->group(function(){
        Route::get('/',[TestimotionalController::class,'index'])->name('imotionals');
        Route::get('/create',[TestimotionalController::class,'create'])->name('create-imotional');
        Route::post('/create',[TestimotionalController::class,'store']);
        Route::get('/edit/{id}',[TestimotionalController::class,'edit'])->name('edit-imotional');
        Route::post('/edit/{id}',[TestimotionalController::class,'update']);
        Route::get('/delete/{id}',[TestimotionalController::class,'delete'])->name('delete-imotional');
    });

    Route::prefix('blog')->group(function(){
        Route::get('/',[BlogController::class,'index'])->name('blogs');
        Route::get('/create',[BlogController::class,'create'])->name('create-blog');
        Route::post('/create',[BlogController::class,'store']);
        Route::get('/edit/{id}',[BlogController::class,'edit'])->name('edit-blog');
        Route::post('/edit/{id}',[BlogController::class,'update']);
        Route::get('/delete/{id}',[BlogController::class,'delete'])->name('delete-blog');
    });

    Route::prefix('vacancy')->group(function(){
        Route::get('/',[VacancyController::class,'index'])->name('vacancies');
        Route::get('/create',[VacancyController::class,'create'])->name('create-vacancy');
        Route::post('/create',[VacancyController::class,'store']);
        Route::get('/edit/{id}',[VacancyController::class,'edit'])->name('edit-vacancy');
        Route::post('/edit/{id}',[VacancyController::class,'update']);
        Route::get('/delete/{id}',[VacancyController::class,'delete'])->name('delete-vacancy');
    });

});