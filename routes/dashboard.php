<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Dashboard\UserController;

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






// Route::middleware('admin')->group(function () {

  


// });

Route::group(['prefix' => '/dashboard','middleware' => ['auth','isAdmin']], function()
{
    Route::get('/', function () {
        return view('index');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class,'index'])->name('dashboard.users');
        Route::get('/create1', [UserController::class,'saveRegister'])->name('dashboard.users.create1');
        Route::get('/create', [UserController::class,'create'])->name('dashboard.users.create');
     
    });


});

