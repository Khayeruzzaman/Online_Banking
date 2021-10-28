<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegController;
use App\Http\Controllers\AdminAllListController;
use App\Http\Controllers\AccountOperationController;


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
//home page
Route::get('/', [HomeController::class, 'welcome'])->name('home.home');

//contact us page
Route::get('/contact-us', [HomeController::class, 'contactus'])->name('home.contactus');

//about us page
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('home.aboutus');

//news page
Route::get('/news', [HomeController::class, 'news'])->name('home.news');

//login
Route::get('/login', [HomeController::class, 'login'])->name('home.login');
Route::post('/login', [HomeController::class, 'loginSubmit'])->name('home.login');

//logout
Route::get('/logout', [HomeController::class, 'logout'])->name('all.logout');

//account registration
Route::get('/create-account', [AccountController::class, 'registration'])->name('account.register');
Route::post('/create-account', [AccountController::class, 'register'])->name('account.register');

//account dashboard
Route::get('/account/dashboard', [AccountOperationController::class, 'dashboard'])->name('account.dashboard')->middleware('CustomerLoginCheck');

//account history
Route::get('/account/my-transections', [AccountOperationController::class, 'history'])->name('account.history');
Route::get('/account/my-transections/{name}', [AccountOperationController::class, 'history']);

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

//admin Create New Customer
Route::get('/admin/create/account/users',[AdminRegController::class , 'customerRegistration'])->name('RegCustomer')
	->middleware('AdminValidCheck');
Route::post('/admin/create/account/users',[AdminRegController::class , 'createCustomer'])->name('CreateCustomer')
	->middleware('AdminValidCheck');

//admin Users Lists
Route::get('/dashboard/admin/adminList',[AdminAllListController::class , 'adminList'])->name('AdminList')
	->middleware('AdminValidCheck');
Route::get('/dashboard/admin/employeeList',[AdminAllListController::class , 'empList'])->name('EmpList')
	->middleware('AdminValidCheck');
Route::get('/dashboard/admin/customerList',[AdminAllListController::class , 'cusList'])->name('CusList')
	->middleware('AdminValidCheck');

//Admin List Edit
Route::get('/admin/adminlist/edit/{id}',[AdminAllListController::class , 'adminListEdit'])->name('AdminListEdit')
->middleware('AdminValidCheck');
Route::post('/admin/adminlist/edit/{id}',[AdminAllListController::class , 'adminListUpdate'])->name('AdminListUpdate')
	->middleware('AdminValidCheck');

//Admin List Update Picture
Route::get('/admin/adminlist/edit/picture/{id}',[AdminAllListController::class , 'editListPicture'])->name('AdminListEditPicture')
	->middleware('AdminValidCheck');
Route::post('/admin/adminlist/edit/picture/{id}',[AdminAllListController::class , 'updateListPicture'])->name('AdminListUpdatePicture')
	->middleware('AdminValidCheck');
//Admin List Delete
Route::get('admin/adminlist/delete/{b_id}/{id}',[AdminAllListController::class , 'deleteList'])->name('AdminListDelete')
	->middleware('AdminValidCheck');

//Admin Employee List Update
Route::get('/admin/emplist/edit/{id}',[AdminAllListController::class , 'empListEdit'])->name('EmpListEdit')
->middleware('AdminValidCheck');
Route::post('/admin/emplist/edit/{id}',[AdminAllListController::class , 'empListUpdate'])->name('EmpListUpdate')
	->middleware('AdminValidCheck');

//Admin Employee List Update Picture
Route::get('/admin/emplist/edit/picture/{id}',[AdminAllListController::class , 'editEmpListPicture'])->name('EmpListEditPicture')
	->middleware('AdminValidCheck');
Route::post('/admin/emplist/edit/picture/{id}',[AdminAllListController::class , 'updateEmpListPicture'])->name('EmpListUpdatePicture')
	->middleware('AdminValidCheck');

//Admin Employee List Delete
Route::get('admin/emplist/delete/{b_id}/{id}',[AdminAllListController::class , 'deleteEmpList'])->name('EmpListDelete')
	->middleware('AdminValidCheck');



//Admin Customer List Update
Route::get('/admin/customerlist/edit/{id}',[AdminAllListController::class , 'cusListEdit'])->name('CusListEdit')
->middleware('AdminValidCheck');
Route::post('/admin/customerlist/edit/{id}',[AdminAllListController::class , 'cusListUpdate'])->name('CusListUpdate')
->middleware('AdminValidCheck');

//Admin Customer List Update Picture
Route::get('/admin/customerlist/edit/picture/{id}',[AdminAllListController::class , 'editCusListPicture'])->name('CusListEditPicture')
	->middleware('AdminValidCheck');
Route::post('/admin/customerlist/edit/picture/{id}',[AdminAllListController::class , 'updateCusListPicture'])->name('CusListUpdatePicture')
	->middleware('AdminValidCheck');

//Admin Customer List Delete
Route::get('admin/customerlist/delete/{b_id}/{id}',[AdminAllListController::class , 'deleteCusList'])->name('CusListDelete')
	->middleware('AdminValidCheck');

//Admin Customers Request
Route::get('/admin/customer/requests',[AdminAllListController::class , 'customerRequests'])->name('CustomerRequest')
->middleware('AdminValidCheck');

Route::get('/admin/customer/requests/{id}',[AdminAllListController::class , 'customerRequestsAccept'])->name('CustomerRequestAccept')
->middleware('AdminValidCheck');
Route::get('/admin/customer/requests/{b_id}/{id}',[AdminAllListController::class , 'customerRequestsDelete'])->name('CustomerRequestDelete')
->middleware('AdminValidCheck');
