@extends('admin.master')

@section('title')
Add-Doctor
@endsection

@section('homecontent')
 <div class="container">
  <h2>Doctor</h2>
   <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  {!! Form::open(['url' => '/Updateddoctor', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'name'=>'editManufacturerForm']) !!}

    <div class="form-group">
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-6">
        <input type="hidden" class="form-control" value="{{$doctors->id}}" name="id">
        <input type="text" class="form-control" value="{{$doctors->dname}}" name="dname">
        <span class="text-danger">{{ $errors->has('dname') ? $errors->first('dname') : '' }}</span>
      </div>
    </div>
      
       <div class="form-group">
      <label class="control-label col-sm-2" >Email</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" value="{{$doctors->email}}" name="email">
        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
      </div>
    </div>

      <div class="form-group">
      <label class="control-label col-sm-2" >Department</label>
      <div class="col-sm-6">
      <select class="form-control" name="deprtId">
        <option>Select your Department</option>
         @foreach($departments as $department)
          <option value="{{$department->id}}">{{$department->name}}</option>
          
          @endforeach 
          </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Designation</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" value="{{$doctors->designation}}" name="designation">
        <span class="text-danger">{{ $errors->has('designation') ? $errors->first('designation') : '' }}</span>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2">Address</label>
      <div class="col-sm-6">          
        <textarea name="address" class="form-control" rows="10">{{$doctors->address}}</textarea>
        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
      </div>
    </div>
     
        <div class="form-group">
      <label class="control-label col-sm-2" >Mobile</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" value="{{$doctors->mobile}}" name="mobile">
        <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Short Biography</label>
      <div class="col-sm-6">          
        <textarea class="form-control" name="shortbiography" rows="5">{{$doctors->shortbiography}}</textarea>
        <span class="text-danger">{{ $errors->has('shortbiography') ? $errors->first('shortbiography') : '' }}</span>
      </div>
    </div>

     <div class="form-group">
                <label class="control-label col-sm-2">Picture</label>
                <div class="col-sm-6">
                     <img src="{{asset($doctors->image)}}" height="130px" width="200px" alt="{{asset($doctors->image)}}">
                    <input type="file" name="image" accept="image/*">
                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                </div>
            </div>

        <div class="form-group">
      <label class="control-label col-sm-2" >Specialist</label>
      <div class="col-sm-6">
       <input type="text" class="form-control" value="{{$doctors->specialist}}" name="specialist">
        <span class="text-danger">{{ $errors->has('specialist') ? $errors->first('specialist') : '' }}</span>
      </div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" >Date of birth</label>
      <div class="col-sm-6">
       <input  type="text" class="datepicker form-control" value="{{$doctors->batdate}}" name="batdate" >
        <span class="text-danger">{{ $errors->has('batdate') ? $errors->first('batdate') : '' }}</span>
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
      <label class="control-label col-sm-2">Education/Degree</label>
      <div class="col-sm-6">          
        <textarea class="form-control" name="degree" rows="10">{{$doctors->degree}}</textarea>
        <span class="text-danger">{{ $errors->has('degree') ? $errors->first('degree') : '' }}</span>
      </div>
    </div>

    <div class="form-group">  
     <label class="control-label col-sm-2">Status</label>      
       <div class="col-sm-6"> 
            <div class="form-check" name="status">
            <label class="radio-inline"><input type="radio" name="status" value="1">Active</label>
                <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>
            </div>
           </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">

       <input type="reset" class="btn btn-danger" value="Cancel">

       <input type="submit" class="btn btn-primary" value="Update">
      </div>
    </div>
  {!! Form::close() !!}
<script type="text/javascript">
 $(function(){
  $('.datepicker').datepicker();
 });
</script> 
</div>
<script>
    document.forms['editManufacturerForm'].elements['deprtId'].value={{$doctors->deprtId}}
</script>
<script>
    document.forms['editManufacturerForm'].elements['sex'].value={{$doctors->sex}}
</script>
<script>
    document.forms['editManufacturerForm'].elements['bloodId'].value={{$doctors->bloodId}}
</script>
<script>
    document.forms['editManufacturerForm'].elements['status'].value={{$doctors->status}}
</script>

@endsection