@extends('admin.master')

@section('title')
Add-Department
@endsection

@section('homecontent')
<br>
<div class="container"> 
<h2>Department-Details</h2>    
 <h3 class="text-center text-success">{{Session::get('message')}}</h3>  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="5%">SL</th>
        <th width="10%">Name</th>
        <th width="55%">Description</th>
        <th width="10%">Status</th>
        <th width="20%">Action</th>
      </tr>
    </thead>
    <tbody>
          <?php $count = 1; ?>
       @foreach($departments as $department)
      <tr>
        <td>{{$count ++ }}</td>
        <td>{{$department->name}}</td>
        <td>{{str_limit($department->description, 200)}}</td>
        <td>{{$department->status == 1 ? 'Active' : 'Inactive'}}</td>
        <td>
        	<a class="btn btn-primary" href="{{url('/edit/department/'.$department->id)}}">
			<span class="glyphicon glyphicon-edit"></span>
        	</a>

        	<a onclick="return confirm('Are You Sure To Delete This');" class="btn btn-danger" href="{{url('/delete/department/'.$department->id)}}">
			<span class="glyphicon glyphicon-trash"></span>
        	</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>



@endsection