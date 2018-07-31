@extends('admin.master')

@section('title')
Add-Department
@endsection

@section('homecontent')
 <div class="container">
  <h2>Department</h2>
   <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  {!! Form::open(['url' => '/savedepartment', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Enter name" name="name">
        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Description</label>
      <div class="col-sm-6">          
        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
        <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
      </div>
    </div>
    <div class="form-group">  
     <label class="control-label col-sm-2">Status</label>      
       <div class="col-sm-6"> 
            <div class="form-check" name="status">
            <label class="radio-inline"><input type="radio" name="status" value="1" checked>Active</label>
                <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>
            </div>
           </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">

       <input type="reset" class="btn btn-danger" value="Cancel">

       <input type="submit" class="btn btn-primary" value="Save">
      </div>
    </div>
  {!! Form::close() !!}
</div>
@endsection