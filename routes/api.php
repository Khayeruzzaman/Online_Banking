<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\AdminApiRegController;
use App\Http\Controllers\AdminApiAllListController;
use App\Http\Controllers\AdminApiLoanController;
use App\Http\Controllers\AdminApiNewsController;
use App\Http\Controllers\HomeAPIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Home API

Route::get('/loan-types', [HomeAPIController::class, 'welcome']);
Route::get('/all-news', [HomeAPIController::class, 'news']);
Route::post('/apilogin', [HomeAPIController::class, 'loginSubmit']);


//-------------------------------------Admin-----------------------------------------------------------//

Route::get('/admin/info/{id}',[AdminApiController::class , 'adminInfromation']);
Route::get('/bank/info/{id}',[AdminApiController::class , 'bankInfromation']);

Route::get('/admin/dashboard',[AdminApiController::class , 'adminDashboard']);
Route::get('/admin/profileinfo/{id}',[AdminApiController::class , 'adminProfile']);
Route::get('/admin/history',[AdminApiController::class , 'history']);

//Admin Profile Update
Route::post('/admin/editprofile/{b_id}/{ad_id}',[AdminApiController::class , 'adminUpdate']);

//Admin Update Picture
Route::post('/admin/updatePicture/{id}',[AdminApiController::class , 'updatePicture']);




//admin Create New Admin
Route::post('/admin/create/admin/users',[AdminApiRegController::class , 'createAdmin']);

//admin Create New Employee
Route::post('/admin/create/employee/users',[AdminApiRegController::class , 'createEmp']);

//admin Create New Customer
Route::get('/admin/create/account/users',[AdminApiRegController::class , 'customerRegistration']);
Route::post('/admin/create/account/users',[AdminApiRegController::class , 'createCustomer']);

//admin Users Lists
Route::get('/admin/dashboard/adminList',[AdminApiAllListController::class , 'adminList'])->middleware('AdminApiAuth');
Route::get('/admin/dashboard/employeeList',[AdminApiAllListController::class , 'empList']);
Route::get('/admin/dashboard/customerList',[AdminApiAllListController::class , 'cusList']);

Route::get('/admin/dashboard/allUserList',[AdminApiAllListController::class , 'userList']);

//Admin List Edit
Route::get('/admin/adminlist/edit/{id}',[AdminApiAllListController::class , 'adminListEdit']);
Route::post('/admin/adminlist/update/{id}',[AdminApiAllListController::class , 'adminListUpdate']);


//Admin List Delete
Route::get('admin/adminlist/delete-admin/{id}',[AdminApiAllListController::class , 'deleteList']);

//Admin Employee List Update
Route::get('/admin/emplist/edit/{id}',[AdminApiAllListController::class , 'empListEdit']);
Route::post('/admin/emplist/update/{id}',[AdminApiAllListController::class , 'empListUpdate']);


//Admin Employee List Delete
Route::get('admin/employees/delete-employee/{id}',[AdminApiAllListController::class , 'deleteEmpList']);



//Admin Customer List Update
Route::get('/admin/customerlist/edit/{id}',[AdminApiAllListController::class , 'cusListEdit']);
Route::post('/admin/customerlist/update/{id}',[AdminApiAllListController::class , 'cusListUpdate']);


//Admin Customer List Delete
Route::get('admin/customerlist/disable/{id}',[AdminApiAllListController::class , 'disableCusList']);

//Admin Customers Request
Route::get('/admin/customer/requests',[AdminApiAllListController::class , 'customerRequests']);

//Admin Customers Request Accept/Disable
Route::get('/admin/customer/requests/accept/{id}',[AdminApiAllListController::class , 'customerRequestsAccept']);
Route::get('/admin/customer/requests/disable/{id}',[AdminApiAllListController::class , 'customerRequestsDisable']);


//Admin Loans Request
Route::get('/admin/loan/requests',[AdminApiLoanController::class , 'loanRequests']);

//Admin Loans Request Accept/Disable
Route::get('/admin/loan/requests/accept/{id}',[AdminApiLoanController::class , 'loanRequestsAccept']);
Route::get('/admin/loan/requests/reject/{id}',[AdminApiLoanController::class , 'loanRequestsReject']);


//Admin News
Route::post('/admin/news/create',[AdminApiNewsController::class , 'newsUpdate']);


//Admin Account All List

Route::get('/admin/account/alllist',[AdminApiController::class , 'accountAllList']);
