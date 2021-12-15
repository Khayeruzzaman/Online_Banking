<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Account;
use App\Models\Employee;
use App\Models\News;
use App\Models\LoanType;

class HomeAPIController extends Controller
{
    public function welcome()
    {
        $loan=LoanType::all();
        return $loan;
    }

    public function news()
    {
        $news=News::orderby('created_at','desc')->get();
        return $news;
    }

    public function loginSubmit(Request $rqst)
    {
        $validation = Validator::make($rqst->all(),
        [
            'username'=>'required|string|min:3',
            'password'=>'required|string|min:3',
        ]);

        if($validation->fails()){
            return response()->json([
                'validation_error' => $validation->messages(),
            ]);
        }
        else {
            // $admin = Admin::where('adminname', $rqst->username)
            //                ->where('password', md5($rqst->password))
            //                ->first();
            // $employee = Employee::where('empname', $rqst->username)
            //                 ->where('password', md5($rqst->password))
            //                 ->first();
            // $customer = Account::where('accountname', $rqst->username)
            //                 ->where('password', md5($rqst->password))
            //                 ->first();
            // if($admin)
            // {
            //     $rqst->session()->put('adminid', $admin->id);
            //     $rqst->session()->put('adminName', $admin->adminname);
            //     return redirect()->route('AdminDashboard');
            // }
            // elseif($employee)
            // {
            //     $rqst->session()->put('empid', $employee->id);
            //     return redirect()->route('home.news');
            // }
            // elseif($customer)
            // {
            //     if($customer->accountstate=="ACTIVE")
            //     {
            //         $rqst->session()->put('accountid', $customer->id);
            //         return redirect()->route('account.dashboard');
            //     }
            //     elseif($customer->accountstate=="INACTIVE")
            //     {
            //         return back()->with('loginerror', 'Your Request is processing. Please check back again after a while!');
            //     }
            //     elseif($customer->accountstate=="DISABLE")
            //     {
            //         return back()->with('loginerror', 'Your account has been disabled by admin. Please contact to Account Relationship Manager!');
            //     }
            // }
            // else {
            //     return back()->with('loginerror', '*Please Enter Valid Credentials!');
            // }
        }
        
    }
}
