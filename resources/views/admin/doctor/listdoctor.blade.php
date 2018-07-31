@extends('admin.master')

@section('title')
Add-Department
@endsection

@section('homecontent')
<br>

<h2>Department-Details</h2>    
 <h3 class="text-center text-success">{{Session::get('message')}}</h3>  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="5%">SL</th>
        <th width="10%">Name</th>
        <th width="10%">Image</th>
        <th width="10%">Email</th>
        <th width="5%">Department</th>
        <th width="5%">Designation</th>
        <th width="15%">Address</th>
        <th width="8%">Mobile</th>
        <th width="5%">Sex</th>
        <th width="5%">Education</th>
        <th width="5%">Status</th>
        <th width="22%">Action</th>
      </tr>
    </thead>
    <tbody>
          <?php $count = 1; ?>
       @foreach($doctors as $doctor)
      <tr>
        <td>{{$count ++ }}</td>
        <td>{{$doctor->dname}}</td>
        <td><img src="{{$doctor->image}}" alt="{{$doctor->image}}" height="120px" width="150px"></td>
        <td>{{$doctor->email}}</td>
        <td>{{$doctor->name}}</td>
        <td>{{$doctor->designation}}</td>
        <td>{{str_limit($doctor->address,50)}}</td>
        <td>{{$doctor->mobile}}</td>
        <td>{{$doctor->sex == 1 ? 'Male' : 'Female'}}</td>
        <td>{{str_limit($doctor->degree,30)}}</td>
        <td>{{$doctor->status == 1 ? 'Active' : 'Inactive'}}</td>
        <td>
        	<a class="btn btn-primary" href="{{url('/view/doctor/'.$doctor->id)}}">
			<span class="glyphicon glyphicon-info-sign"></span>
        	</a>
          <a class="btn btn-primary" href="{{url('/edit/doctor/'.$doctor->id)}}">
      <span class="glyphicon glyphicon-edit"></span>
          </a>

        	<a onclick="return confirm('Are You Sure To Delete This');" class="btn btn-danger" href="{{url('/delete/doctor/'.$doctor->id)}}">
			<span class="glyphicon glyphicon-trash"></span>
        	</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>




@endsection