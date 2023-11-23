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
Route::get('/home5', [App\Http\Controllers\HomeController::class, 'index'])->name('home5');
Route::get('/home6', [App\Http\Controllers\HomeController::class, 'index'])->name('home6');
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