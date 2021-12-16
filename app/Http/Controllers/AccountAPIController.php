<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\BankUser;
use App\Models\History;
use App\Models\Beneficiary;

class AccountAPIController extends Controller
{
    public function dashboard(Request $rqst)
    {
        $customer=Account::where('id', $rqst->id)->first();
        $user=BankUser::where('id', $customer->bank_user_id)->first();
        $history=History::where('account_id', $customer->id)->orderby('created_at','desc')->first();
        $time = strtotime($history->created_at);
        $sanitized_time = date("d/m/Y, g:i A", $time);
        $beneficiarycount=Beneficiary::where('accountid', $customer->id)->count();
        return response()->json([
            'name' => $user->firstname." ".$user->lastname,
            'balance' => $customer->accountbalance,
            'bencount' => $beneficiarycount,
            'date' => $sanitized_time,
            'history' => $history,
        ]);
    }
}
