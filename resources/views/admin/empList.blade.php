@extends('layouts.admin.admin')

@section('title')
    {{'Employee List'}}
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
				<th> Employee Id </th>
				<th>Employee Name</th>
				<th>Employee Picture</th>
				<th>Email</th>
				<th>Salary</th>
				<th>Designation</th>
				<th>join Date</th>
				<th>Actions</th>
			</tr>
		</tbody>

			@foreach($emp as $employee)
			
			<tr>
				<td>{{ $employee->id}}</td>
				<td>{{$employee->empname}}</td>
				<td>
					<a href="{{url('storage/admin/admin_cover_images/'.$employee->userprofilepicture)}}">
						<img src="{{url('storage/admin/admin_cover_images/'.$employee->userprofilepicture)}}" 
					style="width: 30px; height: 30px;">
					</a>
				</td>
				<td>{{$employee->email}}</td>
				<td>{{$employee->empsalary}}</td>
				<td>{{$employee->empdesignation}}</td>
				<td>{{$employee->joindate}}</td>
				
				<td>
					<a href="/admin/emplist/edit/{{$employee->id}}"><img src=" {{ url('admin/admin_dashboard/edit (1).png') }}" style="width: 30px; height: 30px"></a>
					&nbsp &nbsp
					<a href="/admin/emplist/delete/{{$employee->bank_user_id}}/{{$employee->id}}"><img src=" {{ url('admin/admin_dashboard/delete.png') }}" style="width: 30px; height: 30px"></a>

				</td>
				
			</tr>

			@endforeach
			
		</table>

	</div>

</div>


@endsection