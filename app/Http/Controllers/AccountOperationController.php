<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\BankUser;
use App\Models\History;
use App\Models\Beneficiary;

class AccountOperationController extends Controller
{
    public function dashboard()
    {
        $customer=Account::where('id', session()->get('accountid'))->first();
        $user=BankUser::where('id', $customer->bank_user_id)->first();
        $history=History::where('account_id', $customer->id)->orderby('created_at','desc')->first();
        $time = strtotime($history->created_at);
        $sanitized_time = date("d/m/Y, g:i A", $time);
        $beneficiarycount=Beneficiary::where('accountid', $customer->id)->count();
        return view('customer.dashboard')->with('account', $customer)
                                         ->with('user', $user)
                                         ->with('count', $beneficiarycount)
                                         ->with('date', $sanitized_time)
                                         ->with('history', $history);
    }

    public function history()
    {
        $customer=Account::where('id', session()->get('accountid'))->first();
        $history=History::where('account_id', $customer->id)->get();
        return view('customer.history')->with('history',$history);
    }

    public function historysort(Request $req)
    {
        if($req->name=='historydate')
        {
            $customer=Account::where('id', session()->get('accountid'))->first();
            $history=History::where('account_id', $customer->id)->orderby('created_at','desc')->get();
            return view('customer.history')->with('history',$history);
        }
        elseif($req->name=='remarks')
        {
            $customer=Account::where('id', session()->get('accountid'))->first();
            $history=History::where('account_id', $customer->id)->orderby('remarks','desc')->get();
            return view('customer.history')->with('history',$history);
        }
        elseif($req->name=='debit')
        {
            $customer=Account::where('id', session()->get('accountid'))->first();
            $history=History::where('account_id', $customer->id)->orderby('debit','desc')->get();
            return view('customer.history')->with('history',$history);
        }
        elseif($req->name=='credit')
        {
            $customer=Account::where('id', session()->get('accountid'))->first();
            $history=History::where('account_id', $customer->id)->orderby('credit','desc')->get();
            return view('customer.history')->with('history',$history);
        }
    }
}
