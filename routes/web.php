<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/',[HomeController::class, 'home'])->name('app_home');
Route::get('/about',[HomeController::class, 'about'])->name('app_about');
Route::match(['get','post'],'/dashboard',[HomeController::class, 'dashboard'])->middleware('auth')->name('app_dashboard');
/*Route::match(['get','post'],'/login',[LoginController::class, 'login'])->name('app_login');
Route::match(['get','post'],'/register',[LoginController::class, 'register'])->name('app_register');
*/

Route::get('/logout',[LoginController::class, 'logout'])->name('app_logout');
Route::post('/exist_email',[LoginController::class, 'existEmail'])->name('app_exist_email');
Route::match(['get','post'],'/activation_code/{token}',[LoginController::class, 'activationCode'])->name('app_activation_code');
Route::get('/user_checker',[LoginController::class, 'userChecker'])->name('app_user_checker');
Route::get('/resend_activation_code/{token}',[LoginController::class, 'resendActivationCode'])->name('app_resend_activation_code');
Route::get('/activation_account_link/{token}',[LoginController::class, 'activationAccountLink'])->name('app_activation_account_link');
Route::match(['get','post'],'/activation_account_change_email/{token}',[LoginController::class, 'activationAccountChangeEmail'])->name('app_activation_account_change_email');
