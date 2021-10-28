<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountOperationController extends Controller
{
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function history()
    {
        return view('customer.history');
    }
}
