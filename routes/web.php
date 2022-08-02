<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
// Route::get('/',function(){
//     return view('home');
// });

Route::get('/',[HomeController::class,'index']);
Route::post('/save-comment/{id}',[HomeController::class,'save_comment']);
Route::get('/detail/{id}',[HomeController::class,'detail']);
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);

Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
// Categories
Route::get('admin/category/{id}/delete', [CategoryController::class,'destroy']);
Route::resource('admin/category', CategoryController::class);
// Post
Route::get('admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post',PostController::class);
//Setting
Route::get('admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'save_setting']);
// For the user login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Contact Us page
Route::get('admin/contact',[ContactController::class,'index']);
Route::post('send-email',[ContactController::class,'sendEmail'])->name('send.email');
// Route::get('admin/send-mail',[ContactController::class,'sendEmail']);
