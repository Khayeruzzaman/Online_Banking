<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Account;
use App\Models\Employee;


class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function contactus()
    {
        return view('home.contact');
    }

    public function aboutus()
    {
        return view('home.about');
    }

    public function news()
    {
        return view('home.news');
    }

    public function login()
    {
        return view('home.login');
    }

    public function loginSubmit(Request $rqst)
    {
        $validation = $rqst->validate(
            [
                'username'=>'required|string',
                'password'=>'required|string',
            ],
            [
                'username.required'=>'*Please give valid username!',
                'password.required'=>'*Please give correct password',
            ]
        );
        $admin = Admin::where('adminname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        $employee = Employee::where('empname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        $customer = Account::where('accountname', $rqst->username)
                           ->where('password', md5($rqst->password))
                           ->first();
        if($admin)
        {
            $rqst->session()->put('adminid', $admin->id);
            return redirect()->route('home.news');
        }
        elseif($employee)
        {
            $rqst->session()->put('empid', $employee->id);
            return redirect()->route('home.news');
        }
        elseif($customer)
        {
            $rqst->session()->put('accountid', $customer->id);
            return redirect()->route('home.news');
        }
        return back();
    }

    public function logout()
    {
        session()->forget('adminid');
        session()->forget('empid');
        session()->forget('accountid');
        return redirect()->route('home.home');
    }
}
