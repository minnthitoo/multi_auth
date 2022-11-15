<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    //admin
    Route::group(['prefix'=> 'admin', 'middleware' => 'admin_middleware'], function(){
        Route::get('home', [AdminController::class, 'home'])->name('admin#home');
    });

    //user
    Route::group(['prefix' => 'users', 'middleware' => 'user_middleware'], function(){
        Route::get('home', [UserController::class, 'home'])->name('user#home');
    });
});


