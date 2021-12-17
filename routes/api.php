<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminApiController;
use App\Http\Controllers\AdminApiRegController;
use App\Http\Controllers\AdminApiAllListController;
use App\Http\Controllers\AdminApiLoanController;
use App\Http\Controllers\AdminApiNewsController;
use App\Http\Controllers\HomeAPIController;
use App\Http\Controllers\AccountAPIController;


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

//-------------------------------------Account---------------------------------------------------------//
//Account Registration
Route::post('/apiregister', [AccountAPIController::class, 'register']);
//Account dashboard
Route::get('/account-dashboard/{id}', [AccountAPIController::class, 'dashboard'])->middleware("AccountAPIAuth");
//Account Logout
Route::get('/apilogout/{key}', [AccountAPIController::class, 'logout'])->middleware("AccountAPIAuth");
//Account Transections
Route::get('/account-history/{id}', [AccountAPIController::class, 'history'])->middleware("AccountAPIAuth");
//Account Profile
Route::get('/account-profile/{id}', [AccountAPIController::class, 'profile'])->middleware("AccountAPIAuth");
//Account Profile Edit
Route::post('/account-profile/edit', [AccountAPIController::class, 'editSubmit'])->middleware("AccountAPIAuth");
//Account Password Change
Route::post('/account-profile/change-password', [AccountAPIController::class, 'changepasswordSubmit'])->middleware("AccountAPIAuth");
//Account Beneficiary
Route::post('/account-add-beneficiary', [AccountAPIController::class, 'addbeneficiarySubmit'])->middleware("AccountAPIAuth");
//Account Beneficiary List
Route::get('/account-beneficiary-list/{id}', [AccountAPIController::class, 'beneficiarylist'])->middleware("AccountAPIAuth");
//Account Send Money to Beneficiary
Route::post('/account-send-money', [AccountAPIController::class, 'sendSubmit'])->middleware("AccountAPIAuth");
//Account External Payment
Route::post('/account-payment', [AccountAPIController::class, 'paymentSubmit'])->middleware("AccountAPIAuth");
//Account Beneficiary Delete
Route::get('/account-beneficiary-delete/{id}', [AccountAPIController::class, 'deletebeneficiary'])->middleware("AccountAPIAuth");

//-------------------------------------Admin-----------------------------------------------------------//
Route::get('/admin/dashboard',[AdminApiController::class , 'adminDashboard'])->middleware('AdminApiAuth');
Route::get('/admin/viewprofile',[AdminApiController::class , 'adminProfile']);
Route::get('/admin/history',[AdminApiController::class , 'history']);

//Admin Profile Update
Route::get('/admin/editprofile',[AdminApiController::class , 'adminEdit']);
Route::post('/admin/editprofile/{b_id}/{ad_id}',[AdminApiController::class , 'adminUpdate']);

//Admin Update Picture
Route::get('/admin/editpicture/{id}',[AdminApiController::class , 'editPicture']);
Route::post('/admin/editpicture/{id}',[AdminApiController::class , 'updatePicture']);


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

//Admin List Edit
Route::get('/admin/adminlist/edit/{id}',[AdminApiAllListController::class , 'adminListEdit']);
Route::post('/admin/adminlist/edit/{id}',[AdminApiAllListController::class , 'adminListUpdate']);

//Admin List Update Picture
Route::get('/admin/adminlist/edit/picture/{id}',[AdminApiAllListController::class , 'editListPicture']);
Route::post('/admin/adminlist/edit/picture/{id}',[AdminApiAllListController::class , 'updateListPicture']);

//Admin List Delete
Route::get('admin/adminlist/delete/{b_id}/{id}',[AdminApiAllListController::class , 'deleteList']);

//Admin Employee List Update
Route::get('/admin/emplist/edit/{id}',[AdminApiAllListController::class , 'empListEdit']);
Route::post('/admin/emplist/edit/{id}',[AdminApiAllListController::class , 'empListUpdate']);

//Admin Employee List Update Picture
Route::get('/admin/emplist/edit/picture/{id}',[AdminApiAllListController::class , 'editEmpListPicture']);
Route::post('/admin/emplist/edit/picture/{id}',[AdminApiAllListController::class , 'updateEmpListPicture']);

//Admin Employee List Delete
Route::get('admin/emplist/delete/{b_id}/{id}',[AdminApiAllListController::class , 'deleteEmpList']);



//Admin Customer List Update
Route::get('/admin/customerlist/edit/{id}',[AdminApiAllListController::class , 'cusListEdit']);
Route::post('/admin/customerlist/edit/{id}',[AdminApiAllListController::class , 'cusListUpdate']);

//Admin Customer List Update Picture
Route::get('/admin/customerlist/edit/picture/{id}',[AdminApiAllListController::class , 'editCusListPicture']);
Route::post('/admin/customerlist/edit/picture/{id}',[AdminApiAllListController::class , 'updateCusListPicture']);

//Admin Customer List Delete
Route::get('admin/customerlist/disable/{b_id}/{id}',[AdminApiAllListController::class , 'disableCusList']);

//Admin Customers Request
Route::get('/admin/customer/requests',[AdminApiAllListController::class , 'customerRequests']);

//Admin Customers Request Accept/Disable
Route::get('/admin/customer/requests/{id}',[AdminApiAllListController::class , 'customerRequestsAccept']);
Route::get('/admin/customer/requests/{b_id}/{id}',[AdminApiAllListController::class , 'customerRequestsDisable']);


//Admin Loans Request
Route::get('/admin/loan/requests',[AdminApiLoanController::class , 'loanRequests']);

//Admin Loans Request Accept/Disable
Route::get('/admin/loan/requests/accept/{id}',[AdminApiLoanController::class , 'loanRequestsAccept']);
Route::get('/admin/loan/requests/reject/{id}',[AdminApiLoanController::class , 'loanRequestsReject']);




//Admin News
Route::post('/admin/news/create',[AdminApiNewsController::class , 'newsUpdate']);


//Admin Account All List

Route::get('/admin/account/alllist',[AdminApiController::class , 'accountAllList']);
