@extends('admin.master')

@section('title')
Add-Patient
@endsection

@section('homecontent')
<div class="container">
  <h2>Doctor</h2>
   <h3 class="text-center text-success">{{Session::get('message')}}</h3>
  {!! Form::open(['url' => '/update', 'method' => 'POST', 'class' => 'form-horizontal', 'name'=>'editManufacturerForm', 'enctype'=>'multipart/form-data']) !!}

    <div class="form-group">
      <label class="control-label col-sm-2" >Name</label>
      <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$patientsbyid->id}}">
        <input type="text" class="form-control" placeholder="Enter name" name="patientname" value="{{$patientsbyid->patientname}}">
        <span class="text-danger">{{ $errors->has('patientname') ? $errors->first('patientname') : '' }}</span>
      </div>
    </div>
      
     
        <div class="form-group">
      <label class="control-label col-sm-2" >Mobile</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Enter mobile" name="mobile" value="{{$patientsbyid->mobile}}">
        <span class="text-danger">{{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</span>
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
      <label class="control-label col-sm-2">Address</label>
      <div class="col-sm-6">          
        <textarea name="address" class="form-control" rows="10">{{$patientsbyid->address}}</textarea>
        <span class="text-danger">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
      </div>
    </div>

     <div class="form-group">
                <label class="control-label col-sm-2">Picture</label>
                <div class="col-sm-6">
                    <img src="{{asset($patientsbyid->image)}}" alt="{{asset($patientsbyid->image)}}" height="100px" width="120px">
                    <input type="file" name="image" accept="image/*">
                     <input type="hidden" name="old_image" accept="image/*" value="{{$patientsbyid->image}}">
                    <span class="text-danger">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                </div>
            </div>
      
     <div class="form-group">  
     <label class="control-label col-sm-2">Sex</label>      
        <div class="col-sm-6">
      <div class="form-check" name="sex">
            
              <?php
               if ($patientsbyid->sex == '1') { ?>
               <label class="radio-inline">
                <input type="radio" name="sex" selected="selected" value="1" checked>Male </label>
               <?php } else if ($patientsbyid->sex == '2') { ?>
                 <label class="radio-inline">
             <input type="radio" name="sex" selected="selected" value="2" checked>Female
              </label>
              <?php } else { ?>
                <label class="radio-inline">
            <input type="radio" name="sex" selected="selected" value="3" checked>Other
         </label>
              <?php } ?>
            
      </div>
        </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" >Date of birth</label>
      <div class="col-sm-6">
       <input  type="text" class="datepicker form-control" placeholder="MM/DD/YYYY" name="batdate" value="{{$patientsbyid->batdate}}">
        <span class="text-danger">{{ $errors->has('batdate') ? $errors->first('batdate') : '' }}</span>
      </div>
    </div>
    <div class="form-group">  
     <label class="control-label col-sm-2">Status</label>      
       <div class="col-sm-6"> 
            <div class="form-check" name="status">
            <label class="radio-inline"><input type="radio" name="status" value="1" >Active</label>
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
<script>
    document.forms['editManufacturerForm'].elements['bloodId'].value={{$patientsbyid->bloodId}}
</script>
<script>
    document.forms['editManufacturerForm'].elements['status'].value={{$patientsbyid->status}}
</script>
@endsection