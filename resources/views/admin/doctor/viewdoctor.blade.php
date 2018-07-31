@extends('admin.master')

@section('title')
Add-Department
@endsection

@section('homecontent')
<div class="container">
 <h3>Doctor Information View</h3>
<table class="table table-bordered table-hover">
  <tr>
        <th>Name</th>
        <th>{{$doctorviwId->dname}}</th>
    </tr>
     <tr>
        <th>Email</th>
        <th>{{$doctorviwId->email}}</th>
    </tr>
     <tr>
        <th>Department</th>
        <th>{{$doctorviwId->name}}</th>
    </tr>
     <tr>
        <th>Designation</th>
        <th>{{$doctorviwId->designation}}</th>
    </tr>
     <tr>
        <th>Address</th>
        <th>{{$doctorviwId->address}}</th>
    </tr>
    <tr>
        <th>Mobile</th>
        <th>{{$doctorviwId->mobile}}</th>
    </tr>
    <tr>
        <th>Short Biography</th>
        <th>{{$doctorviwId->shortbiography}}</th>
    </tr>
    <tr>
        <th>Picture</th>
        <th><img src="{{asset($doctorviwId->image)}}" alt="{{$doctorviwId->image}}" height="150px" width="200px"></th>
    </tr>
    <tr>
        <th>Specialist</th>
        <th>{{$doctorviwId->specialist}}</th>
    </tr>
    <tr>
        <th>Date of birth</th>
        <th>{{$doctorviwId->batdate}}</th>
    </tr>
    <tr>
        <th>Sex</th>
        <th>{{$doctorviwId->sex == 1 ? 'Male' : 'Female'}}</th>
    </tr>
    <tr>
        <th>Blood Group</th>
        <th>{{$doctorviwId->bloodname}}</th>
    </tr>
     <tr>
        <th>Education/Degree</th>
        <th>{{$doctorviwId->degree}}</th>
    </tr>
     <tr>
        <th>Status</th>
        <th>{{$doctorviwId->status == 1 ? 'Active' : 'Inactive'}}</th>
    </tr>
</table>
  <h2 class="text-center"><a href="{{url('/doctorlist')}}">Doctor-List</a></h2>
</div>
@endsection