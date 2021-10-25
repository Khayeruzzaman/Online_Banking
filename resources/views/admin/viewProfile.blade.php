@extends('Layouts.admin.admin')

@section('title')
{{'View Profile'}}
@endsection

@section('content')

<style type="text/css">
	#profile{
	


    	width:75%;
        margin: 10px 300px;
        padding:50px;
        background: transparent;
        border-radius: 10px;
        box-shadow: 0px 0px 10px black;
        margin-bottom: 50px;
    

	}
	
</style>


<div id="profile">
	<br>
	<table class="table table-striped table-hover table-bordered border-dark" >
	<tr>
		<th style="text-align: center; background-color: #373b8b; color: white;" colspan="3"> {{session()->get('adminName')."'s Infromation"}} </th>
	</tr>
	<tr>
		<th>First Name</th>
		<td>{{$bank->firstname}}</td>
		<td rowspan="5" style="text-align: center"><img src=  "{{url('storage/admin/admin_cover_images/'.$bank->userprofilepicture)}}" 
			style="width: 200px; height:200px;"></td>
	</tr>

	<tr>
		<th>Last Name</th>
		<td>{{$bank->lastname}}</td>
	</tr>

	<tr>
		<th> Gender </th>
		<td>{{$bank->gender}}</td>
	</tr>

	<tr>
		<th> Date Of Birth </th>
		<td>{{$bank->dateofbirth}}</td>
	</tr>

	<tr>
		<th> Phone </th>
		<td>{{$bank->phone}}</td>
	</tr>

	<tr>
		<th> Email </th>
		<td colspan="2">{{$bank->email}}</td>
	</tr>

	<tr>
		<th> Nid No </th>
		<td colspan="2">{{$bank->nid}}</td>
	</tr>

	<tr>
		<th>Admin Name</th>
		<td colspan="2">{{$admin->adminname}}</td>
	</tr>

	<tr>
		<th>Password</th>
		<td colspan="2">{{$admin->password}}</td>
	</tr>

	<tr>
		<th>Salary</th>
		<td colspan="2">{{$admin->adminsalary}}</td>
	</tr>

	</table>


	<a class=" btn btn-primary" href="{{ route('AdminEdit') }}" style="text-transform: uppercase; text-align: center; margin-right: 01px; float: right;"> Edit </a>
	<br>
	<br>
</div>


@endsection 