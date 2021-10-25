<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegController;

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


//admin Dashboard
Route::get('/admin/dashboard',[AdminController::class , 'adminDashboard'])->name('AdminDashboard')
	->middleware('AdminValidCheck');
Route::get('/admin/viewprofile',[AdminController::class , 'adminProfile'])->name('AdminProfile')
	->middleware('AdminValidCheck');

//Admin Profile Update
Route::get('/admin/editprofile',[AdminController::class , 'adminEdit'])->name('AdminEdit')
	->middleware('AdminValidCheck');
Route::post('/admin/editprofile/{b_id}/{ad_id}',[AdminController::class , 'adminUpdate'])->name('AdminUpdate')
	->middleware('AdminValidCheck');

//Admin Update Picture
Route::get('/admin/editpicture/{id}',[AdminController::class , 'editPicture'])->name('AdminEditPicture')
	->middleware('AdminValidCheck');
Route::post('/admin/editpicture/{id}',[AdminController::class , 'updatePicture'])->name('AdminUpdatePicture')
	->middleware('AdminValidCheck');

//admin Create New Admin
Route::get('/admin/create/admin/users',[AdminRegController::class , 'adminRegistration'])->name('RegAdmin')
	->middleware('AdminValidCheck');
Route::post('/admin/create/admin/users',[AdminRegController::class , 'createAdmin'])->name('CreateAdmin')
	->middleware('AdminValidCheck');

//admin Create New Employee
Route::get('/admin/create/employee/users',[AdminRegController::class , 'empRegistration'])->name('RegEmp')
	->middleware('AdminValidCheck');
Route::post('/admin/create/employee/users',[AdminRegController::class , 'createEmp'])->name('CreateEmp')
	->middleware('AdminValidCheck');
