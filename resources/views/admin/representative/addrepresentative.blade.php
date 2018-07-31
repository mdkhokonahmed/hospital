@extends('admin.master')

@section('title')
Add-Representative
@endsection

@section('homecontent')
 <div class="container">
  <h2>Representative</h2>
   <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  {!! Form::open(['url' => '/saverepresentative', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
      <label class="control-label col-sm-2" >Full Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Enter name" name="rname">
        <span class="text-danger">{{ $errors->has('rname') ? $errors->first('rname') : '' }}</span>
      </div>
    </div>
      
       <div class="form-group">
      <label class="control-label col-sm-2" >Email</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Enter email" name="email">
        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" >Phone</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Enter Phone" name="phone">
        <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
      </div>
    </div>

      <div class="form-group">  
     <label class="control-label col-sm-2">Blood Group</label>      
       <div class="col-sm-6"> 
            <select class="form-control" name="bloodId">
             <option>Select your Blood</option>

            @foreach($bloodnames as $bloodname)
          <option value="{{$bloodname->id}}">{{$bloodname->bloodname}}</option>
          
          @endforeach 
           </select>
           </div>
    </div>

      <div class="form-group">  
     <label class="control-label col-sm-2">Sex</label>      
        <div class="col-sm-6">
      <select class="form-control" name="sex">
        <option>Select your Sex</option>
          <option value="1">Male</option>
          <option value="0">Female</option>
          </select>
      </div>
        </div>

       <div class="form-group">
      <label class="control-label col-sm-2" >Date of birth</label>
      <div class="col-sm-6">
       <input  type="text" class="datepicker form-control" placeholder="MM/DD/YYYY" name="batdate" >
        <span class="text-danger">{{ $errors->has('batdate') ? $errors->first('batdate') : '' }}</span>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Address</label>
      <div class="col-sm-6">          
        <textarea name="address" class="form-control" rows="10"></textarea>
        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
      </div>
    </div>
     
      
     <div class="form-group">
        <label class="control-label col-sm-2">Picture</label>
        <div class="col-sm-6">
            <input type="file" name="image" accept="image/*">
            <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
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
  
<script type="text/javascript">
 $(function(){
  $('.datepicker').datepicker();
 });

    

</script> 
</div>

@endsection