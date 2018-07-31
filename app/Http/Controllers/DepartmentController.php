<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Department;

class DepartmentController extends Controller
{
   public function index(){

   	return view('admin.department.adddepartment');
   }

  public function StoreDepartment(Request $request){
    
        $this->validate($request,[
         'name' => 'required',
         'description' => 'required'
         
     	],
     	[
     	'name.required' =>'Place Your Department Name!',
     	'description.required' =>'Place Your Department Description!',
     	]);

     	DB::table('departments')->insert([
             'name' => $request->name,
             'description' => $request->description,
             'status' => $request->status,
     		]);

      return redirect('/adddepartment')->with('message', 'Department Added successfully');

  }

  public function departmentList(){
      $departments = DB::table('departments')
                     ->orderBy('id', 'DESC')
                     ->get();
  	return view('admin.department.departmentlist',['departments'=>$departments]);
  }

  public function departmenEdit($id){
  	$departById = DB::table('departments')
                     ->where('id', $id)
                     ->first();
  	return view('admin.department.departmentedit',['departById'=>$departById]);
  }

  public function UpdatedDepartment(Request $request){
  	  $this->validate($request,[
         'name' => 'required',
         'description' => 'required'
         
     	],
     	[
     	'name.required' =>'Place Your Department Name!',
     	'description.required' =>'Place Your Department Description!',
     	]);

  	   $data = array();
  	   $id = $request->id;
  	   $data['name'] = $request->name;
  	   $data['description'] = $request->description;
  	   $data['status'] = $request->status;

  	  DB::table('departments')
  	  		->where('id', $id)
  	  		->update($data);

  	   return redirect('/listdepartment')->with('message', 'Department Updated successfully');	
  }

  public function departmentDelete($id){
   DB::table('departments')
   		->where('id', $id)
   		->delete();  
   return redirect('/listdepartment')->with('message', 'Department Deleted successfully');	
  }

}
