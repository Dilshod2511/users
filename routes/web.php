<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
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



Route::get('login',[App\Http\Controllers\Auth\LoginController::class,'index'])->name('login');
Route::post('login',[App\Http\Controllers\Auth\LoginController::class,'login']);
Route::get('register',[App\Http\Controllers\Auth\RegisterController::class,'index'])->name('register');
Route::post('register',[App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::post('verify',[App\Http\Controllers\Auth\RegisterController::class,'verify'])->name('verify');
Route::post('send-phone',[App\Http\Controllers\Auth\LoginController::class,'send'])->name('send');
Route::post('check',[App\Http\Controllers\Auth\LoginController::class,'check'])->name('check');
Route::get('forget-password', function () {
    return view('auth.sendPhone');
})->name('forget-password');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
       
        auth()->logout();
        return view('site.user.form');
    });
    Route::resources([
        'users'=>Site\UserController::class,
    ]);


});


