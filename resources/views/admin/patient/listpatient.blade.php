@extends('admin.master')

@section('title')
Add-Department
@endsection

@section('homecontent')
<br>

<h2>Representative-list</h2>    
 <h3 class="text-center text-success">{{Session::get('message')}}</h3> 

  {!! Form::open(['url' => '/search', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      {!! Form::close() !!}

  <table class="table table-bordered">
    <thead>
      <tr>
        <th width="5%">SL</th>
        <th width="10%">Name</th>
        <th width="10%">Image</th>
        <th width="10%">Mobile</th>
        <th width="20%">Address</th>
        <th width="10%">Date of birth</th>
        <th width="5%">Sex</th>
        <th width="5%">Status</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
          <?php $count = 1; ?>
       @foreach($patients as $patient)
      <tr>
        <td>{{$count ++ }}</td>
        <td>{{$patient->patientname}}</td>
        <td><img src="{{$patient->image}}" alt="{{$patient->image}}" height="120px" width="150px"></td>
        <td>{{$patient->mobile}}</td>
        <td>{{str_limit($patient->address,50)}}</td>
        <td>{{$patient->batdate}}</td>
        <td>
          
          <?php
              if ($patient->sex == 1) {
                echo "Male";
              } else if ($patient->sex == 2) {
               echo "Female";
              } else {
                echo "Other";
              }
            ?>
        </td>
        
        <td>{{$patient->status == 1 ? 'Active' : 'Inactive'}}</td>
        <td>
        	</a>
          <a class="btn btn-primary" href="{{url('/edit/patient/'.$patient->id)}}">
      <span class="glyphicon glyphicon-edit"></span>
          </a>

        	<a onclick="return confirm('Are You Sure To Delete This');" class="btn btn-danger" href="{{url('/deletePatient/'.$patient->id)}}">
			<span class="glyphicon glyphicon-trash"></span>
        	</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<div class="pagination-bar text-center">
   
    </div>



@endsection