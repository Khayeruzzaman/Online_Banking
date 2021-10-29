<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\BankUser;
use App\Models\Beneficiary;

class AccountBeneficiaryController extends Controller
{
    public function addbeneficiary()
    {
        $account=Account::where('id', session()->get('accountid'))->first();
        $user=BankUser::where('id', $account->bank_user_id)->first();
        return view('customer.addbeneficiary')->with('account',$account)
                                              ->with('user', $user);
    }

    public function addbeneficiarySubmit(Request $rqst)
    {
        $validate=$rqst->validate(
            [
                'beneficiaryname' => 'required|min:5|alpha_dash',
                'beneficiaryaccountname' => 'required|exists:accounts,accountname',
            ],
            [
                'beneficiaryname.required'=>'Beneficiary name is required',
                'beneficiaryname.alpha_dash'=>'Beneficiary name should  contain letters and numbers with dashes',
                'beneficiaryaccountname.required'=>'Account name is required',
                'beneficiaryaccountname.exists'=>'Account name does not exists',
            ]
        );
        $account=Account::where('id', session()->get('accountid'))->first();
        $accountb=Account::where('accountname', $rqst->beneficiaryaccountname)->first();
        $user=BankUser::where('id', $account->bank_user_id)->first();
        $var = new Beneficiary();
        $var->beneficiaryname=$rqst->beneficiaryname;
        $var->beneficiaryaccountid=$accountb->id;
        $var->accountid=$account->id;
        $var->save();
        return redirect()->route('account.dashboard');
    }

    public function beneficiarylist()
    {
        $account=Account::where('id', session()->get('accountid'))->first();
        $user=BankUser::where('id', $account->bank_user_id)->first();
        return view('customer.beneficiarylist')->with('account',$account)
                                               ->with('user', $user);
    }
}
