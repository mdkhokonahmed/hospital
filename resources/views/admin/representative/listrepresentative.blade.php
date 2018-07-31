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
        <th width="10%">Full Name</th>
        <th width="10%">Image</th>
        <th width="10%">Phone</th>
        <th width="10%">Email</th>
        <th width="20%">Address</th>
        <th width="10%">Date of birth</th>
        <th width="5%">Sex</th>
        <th width="5%">Status</th>
        <th width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
          <?php $count = 1; ?>
       @foreach($representatives as $representative)
      <tr>
        <td>{{$count ++ }}</td>
        <td>{{$representative->rname}}</td>
        <td><img src="{{$representative->image}}" alt="{{$representative->image}}" height="120px" width="150px"></td>
        <td>{{$representative->phone}}</td>
        <td>{{$representative->email}}</td>
        <td>{{str_limit($representative->address,50)}}</td>
        <td>{{$representative->batdate}}</td>
        <td>{{$representative->sex == 1 ? 'Male' : 'Female'}}</td>
        
        <td>{{$representative->status == 1 ? 'Active' : 'Inactive'}}</td>
        <td>
        	</a>
          <a class="btn btn-primary" href="{{url('/edit/representative/'.$representative->id)}}">
      <span class="glyphicon glyphicon-edit"></span>
          </a>

        	<a onclick="return confirm('Are You Sure To Delete This');" class="btn btn-danger" href="{{url('/delete/representative/'.$representative->id)}}">
			<span class="glyphicon glyphicon-trash"></span>
        	</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
<div class="pagination-bar text-center">
    {{ $representatives->links() }}
    </div>



@endsection