<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('home.home');

Route::get('/contact-us', [HomeController::class, 'contactus'])->name('home.contactus');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('home.aboutus');
Route::get('/news', [HomeController::class, 'news'])->name('home.news');
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/login', [HomeController::class, 'loginSubmit'])->name('home.login');
Route::get('/logout', [HomeController::class, 'logout'])->name('all.logout');

Route::get('/create-account', [AccountController::class, 'registration'])->name('account.register');
Route::post('/create-account', [AccountController::class, 'register'])->name('account.register');
