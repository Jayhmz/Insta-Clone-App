<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\AuthController;
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

// pages controller
Route::get("instagram/login",[mainController::class, 'login'])->name('instagram.login');
Route::get("instagram/signup",[mainController::class, 'register'])->name('instagram.signup');
Route::get("instagram/{user}",[mainController::class, 'homepage'])->name('instagram.homepage');
Route::get("logout",[AuthController::class, 'logout'])->name('instagram.logout');

// post controller
Route::post("instagram/signup", [AuthController::class, 'Register'])->name("instagram.register");
Route::post("instagram/login", [AuthController::class, 'Login'])->name("instagram.login");
