<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('user/register', [AuthController::class,'create'])->name('user.register');
Route::get('user/login', [AuthController::class,'login'])->name('user.login.redirect');
Route::post('user/login-check', [AuthController::class,'loginCheck'])->name('user.login-check');
/*
|--------------------------------------------------------------------------
| End
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['frontend']],function(){
    Route::get('user/dashboard', [AuthController::class,'dashboard'])->name('user.dashboard');
    Route::get('user/logout', [AuthController::class,'logout'])->name('user.logout');
    Route::get('user/profile', [AuthController::class,'profile'])->name('user.profile');
 })->name('user');
 /*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['admin']],function(){
    Route::get('admin/dashboard', [AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/profile', [AdminController::class,'profile'])->name('admin.profile');
   
 })->name('admin');
/*
|--------------------------------------------------------------------------
| End
|--------------------------------------------------------------------------
*/


 