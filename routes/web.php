<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::get('login', [App\Http\Controllers\LoginController::class, 'login']);
Route::post('login/login-verification', [App\Http\Controllers\LoginController::class, 'loginvalidation']);

Route::get('login/forgot-password', [App\Http\Controllers\LoginController::class, 'forgotpass']);
Route::get('email-verified/new-password', [App\Http\Controllers\LoginController::class, 'newpasswordcreation']);

Route::get('Mainpage/dashboard', [App\Http\Controllers\SideNavController::class, 'dashboard']);
Route::get('Mainpage/survey', [App\Http\Controllers\SideNavController::class, 'survey']);
Route::get('Mainpage/surveycreate', [App\Http\Controllers\SideNavController::class, 'createSurvey']);
Route::get('Mainpage/response', [App\Http\Controllers\SideNavController::class, 'response']);

Route::get('Mainpage/signout', [App\Http\Controllers\SideNavController::class,'signOut']);