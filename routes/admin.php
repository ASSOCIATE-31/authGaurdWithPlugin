<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home1', [App\Http\Controllers\HomeController::class, 'index'])->name('home1');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'index'])->name('index');
/*
|--------------------------------------------------------------------------
| End
|--------------------------------------------------------------------------
*/
