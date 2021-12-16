<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankUser;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Account;
use App\Models\History;

class AdminApiController extends Controller
{
    public function adminDashboard(){

    	$admins = Admin::all();
    	$employees = Employee::all();
    	$customers = Account::all();
    	
    	$No = 0;
    	foreach ($customers as $customer) {
    		if($customer ->accountstate == 'ACTIVE'){

    			$No++;
    		}
    	}

    	$customerNo= $No;

    	return response()->json( [$admins, $employees, $customers]);
    }

    public function adminProfile(){

    	$admin = Admin::where('id',2)->first();
    	$bank = BankUser::where('id',$admin->bank_user_id)->first();
    	return response()->json( [
    		'admin' => $admin, 
    		'bank' => $bank,
    		'status' =>200,
    	]);
    }

    public function adminEdit(){

    	$admin = Admin::where('id',2)->first();
    	$bank = BankUser::where('id',$admin->bank_user_id)->first();
    	return response()->json( [$admin, $bank]);

    }

    public function adminUpdate(Request $request){

    	$this->validate($request, 
    		[
	     		'fname' => 'required | min:2 | string ',

	     		'lname' => 'required | min:3 | string ',

	     		'gender' => 'required',

	     		'dob' => 'required',

	     		'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/',

	     		'email' => 'required | email',

	     		'nid' => 'required',

	     		'ad_name' => 'required | min:2 ',

	     		'password' => 'required | min:8',

	     		'sal' => 'required | integer'
	     	],

	     	[
	     		'fname.required' => 'Please fill up your First Name properly!',
	     		'fname.min' => 'Minimum 2 character',
	     		'lname.required' => 'Please fill up your Last Name properly!',
	     		'lname.min' => 'Minimum 3 character',
	     		'gender.required' => 'Please choose your gender!',
	     		'dob.required' => 'Please select your Date of Birth',
	     		'phone.required' => 'Please enter your phone number',
	     		'email.required' => 'Please fill up your Email properly!',
	     		'nid.required' => 'Please fill your Nid properly!',
	     		'ad_name.required' => 'Please fill up your User Name properly!',
	     		'ad_name.min' => 'Minimum 2 character',
	     		'password.required' => 'Please fill up your password properly!',
	     		'password.min' => 'Minimum 8 character',
	     		'sal.required' => 'Please Enter admin salary'

	     	]
    	);

    		$user = BankUser::where('id',$request->b_id)->first();
	    	$user->firstname = $request->f_name;
	    	$user->lastname = $request->l_name;
	    	$user->gender = $request->gender;
	    	$user->dateofbirth = $request->dob;
	    	$user->phone = $request->phone;
		    $user->email = $request->email;
		    $user->nid = $request->nid;
		    $user->save();

		    $bank_Id =  $user->id;


		    $admin = Admin::where('id',$request->ad_id)->first();
		    $admin->adminname = $request->ad_name; 

		    $password = $admin->password;

		    if ($password != $request->password && $request->password != "") {

		    	$admin->password = md5($request->password);
		    }else{
		    	$admin->password = $password;
		    }

		    
		    
		    $admin->adminsalary = $request->sal;
		    $admin->bank_user_id = $bank_Id;
		    $admin->save();
		    return $request;
		   //return redirect()->route('AdminProfile');

    }

    public function editPicture(Request $request){

    	$user = BankUser::where('id',$request->id)->first();

    	return response()->json($user);
    }

    public function updatePicture(Request $request){

    	$this->validate($request, 
    		[
    			'pic' => 'image | nullable | max:1999'
    		]);

    	if($request->hasFile('pic')){

	    		$fileNameWithExt = $request->file('pic')->getClientOriginalName();

	    		$fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

	    		$ext = $request->file('pic')->getClientOriginalExtension();

	    		$fileNameToStore = $fileName.'_'.time().'.'.$ext;

	    		$path = $request->file('pic')->storeAs('public/admin/admin_cover_images', $fileNameToStore);
	     	}else{

	     		$user = BankUser::where('id',$request->id)->first();

	     		$fileNameToStore = $user->userprofilepicture;
	     	}


	    $user = BankUser::where('id',$request->id)->first();
    	$user->userprofilepicture = $fileNameToStore;
    	$user->save();

    	return $request;
    	//return redirect()->route('AdminProfile');
    	
    	

    }


    public function history(Request $request){

    	if(!empty($request->search)){

    		$history = History::where('account_id','like','%'.$request->search.'%')->get();
    		$credit = History::sum('credit');
	    	$debit = History::sum('debit');
	    	$balance = $credit - $debit;
	    	return response()->json($history);

    	}else{

    		$history = History::all();
	    	$credit = History::sum('credit');
	    	$debit = History::sum('debit');
	    	$balance = 10000000+($credit - $debit);
	    	return $request;
    	}

    	
    }

    public function accountAllList(){

    	$account = DB::table('bank_users')
	            ->join('accounts', 'bank_users.id', '=', 'accounts.bank_user_id')
	            ->select('bank_users.*', 'accounts.*')
	            ->get();

	    	return response()->json($account);
    }
}
