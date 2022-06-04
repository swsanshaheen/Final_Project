<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontSiteController;
use \App\Http\Controllers\dashboard;
use \App\Http\Controllers\AuthController;

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/auth',[AuthController::class,'auth'])->name('auth');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'do_register'])->name('do_register');
Route::get('passe/{id}', [AuthController::class,'change'])->name('change');
Route::post('pass/{id}', [AuthController::class,'do_change'])->name('do_change');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/',[dashboard\DashboardController::class,'index'])->name('admin.admin');
    Route::resource('post',dashboard\PostController::class);
    Route::resource('user',dashboard\UserController::class);
    Route::resource('category',dashboard\CategoryController::class);
});

//Route::get('orm',[dashboard\PostController::class,'ORM']);


Route::get('/',[FrontSiteController::class,'Show_home'])->name('home');

//Route::get('/', function () {
//    return view('frontsite.index');
//})->name('home');

Route::get('/category/{id}',[FrontSiteController::class,'Show_category'])->name('category');

Route::get('/categories',[FrontSiteController::class,'Show_categories'])->name('categories');

//Route::get('/category', function () {
//    return view('frontsite.category');
//})->name('category');

//Route::get('/contact',[FrontSiteController::class,'Show_contact'])->name('contact');

//Route::get('/contact', function () {
//    return view('frontsite.contact');
//})->name('contact');

Route::get('/single/{id}',[FrontSiteController::class,'Show_single'])->name('single');
Route::post('/sarch',[FrontSiteController::class,'sarch'])->name("sarch");
Route::post('/comment',[FrontSiteController::class,'comment'])->name("comment");


//Route::get('/single', function () {
//    return view('frontsite.single');
//})->name('single');


