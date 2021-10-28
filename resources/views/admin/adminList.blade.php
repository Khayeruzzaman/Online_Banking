@extends('layouts.admin.admin')

@section('title')
    {{'Admin List'}}
@endsection

@section('content')

	<style type="text/css">

		
		.dashContent{
			margin-left: 310px;
		}

		.Users{
		    padding: 2px 2px;
		    display: flex;
		    align-items: center;
		    justify-content: space-between;
		    flex-wrap: wrap;
		}

		.Users img{
		   width: 80px;
		   height: 80px;
		   align-items: center;
		}
		.Users .ad, .emp, .cus{
			
		    width: 250px;
		    height: 150px;
		    background: #ddd;
		    display: flex;
		    align-items: center;
		    justify-content: space-around;
		    box-shadow: 0px 0px 10px black;
		    border-radius: 20px;
		    margin-right: 40px;
		    
		}

		.viewUsers{
			
			min-height: 80vh;
			max-height: auto;
			max-width: auto;
		    box-shadow: 0px 0px 10px black;
		    display: inline-flex;
		    background: #ddd;
			border-radius: 10px;
			margin-right: 40px;
			padding: 20px;
		}

		
		.viewUsers #tb{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 15px;
		    border-collapse: collapse;
			text-align: center;
			border: 2px solid #373b8b;
		}


		.viewUsers .#tb tr, th, td{
			
			
			border: 2px solid #063146;
			padding: 2px 2px;
			  
		}

		.viewUsers #tb th{
			background: #373b8b;
			text-transform: uppercase;
			column-width: 150px;
			justify-content: center;
			color: white
		}


		
	</style>

<div class="dashContent">


	<div class="viewUsers">
		<br>
		<table id="tb" class="table table-striped table-hover table-bordered border-dark" >
			<tbody>
			<tr>
				<th> Admin Id </th>
				<th>Admin Name</th>
				<th>Password</th>
				<th>Salary</th>
				<th>Actions</th>
			</tr>
		</tbody>

			@foreach($admin as $admin)
			@if($admin->id != session()->get('adminid'))
			<tr>
				<td>{{ $admin->id}}</td>
				<td>{{$admin->adminname}}</td>
				<td>{{$admin->password}}</td>
				<td>{{$admin->adminsalary}}</td>
				
				<td>
					<a href="/admin/adminlist/edit/{{$admin->id}}"><img src=" {{ url('admin/admin_dashboard/edit (1).png') }}" style="width: 30px; height: 30px"></a>
					&nbsp &nbsp
					<a href="/admin/adminlist/delete/{{$admin->bank_user_id}}/{{$admin->id}}"><img src=" {{ url('admin/admin_dashboard/delete.png') }}" style="width: 30px; height: 30px"></a>

				</td>
				
			</tr>
			@endif
			@endforeach
			
		</table>

	</div>

</div>


@endsection