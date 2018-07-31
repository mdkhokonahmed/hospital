<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Doctor;
class DoctorController extends Controller
{
    public function index(){
     $departments = DB::table('departments')->select('id', 'id', 'name', 'name')->get();
     $bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
     return view('admin.doctor.adddoctor',['departments'=>$departments, 'bloodnames'=>$bloodnames]);	
    }


    public function StoreDoctor(Request $request){
      
          $this->validate($request,[
         'dname' => 'required',
         'email' => 'required',
         'designation' => 'required',
         'address' => 'required',
         'mobile' => 'required',
         'shortbiography' => 'required',
         'image' => 'required',
         'specialist' => 'required',
         'batdate' => 'required',
          'degree' => 'required'

     	],
     	[
     	'dname.required' =>'Place Your Doctor Name!',
     	'email.required' =>'Place Your Doctor email!',
     	'designation.required' =>'Place Your designation!',
     	'address.required' =>'Place Your Address!',
     	'mobile.required' =>'Place Your Mobile!',
     	'shortbiography.required' =>'Place Your shortbiography!',
     	'image.required' =>'Place Your Image!',
     	'specialist.required' =>'Place Your specialist!',
     	'batdate.required' =>'Place Your Date of Brith!',
     	'degree.required' =>'Place Your degree!'
     	]);


        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $uploadPath = 'public/image/';
        $image->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;

        $doctor = new Doctor();
        $doctor->dname = $request->dname;
        $doctor->email = $request->email;
        $doctor->deprtId = $request->deprtId;
        $doctor->designation = $request->designation;
        $doctor->address = $request->address;
        $doctor->mobile = $request->mobile;
        $doctor->shortbiography = $request->shortbiography;
        $doctor->image = $imageUrl;
        $doctor->specialist = $request->specialist;
        $doctor->batdate = $request->batdate;
        $doctor->sex = $request->sex;
        $doctor->bloodId = $request->bloodId;
        $doctor->degree = $request->degree;
        $doctor->status = $request->status;

        $doctor->save();


    return redirect('/adddoctor')->with('message', 'Doctor Added successfully');	

    }

  public function DoctorList(){
  $doctors = DB::table('doctors')
            ->join('departments', 'doctors.deprtId', '=', 'departments.id')
            ->join('blood', 'doctors.bloodId', '=', 'blood.id')
            ->select('doctors.*', 'departments.name', 'blood.bloodname')
            ->get();
  return view('admin.doctor.listdoctor',['doctors'=>$doctors]);	
  }

  public function DoctorView($id){
     $doctorviwId = DB::table('doctors')
            ->join('departments', 'doctors.deprtId', '=', 'departments.id')
            ->join('blood', 'doctors.bloodId', '=', 'blood.id')
            ->select('doctors.*', 'departments.name', 'blood.bloodname')
            ->where('doctors.id', $id)
            ->first();
  return view('admin.doctor.viewdoctor',['doctorviwId'=>$doctorviwId]);
  }

  public function DoctorEdit($id){
  	 $departments = DB::table('departments')->select('id', 'id', 'name', 'name')->get();
     $bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
     $doctors = DB::table('doctors')
                     ->where('id', $id)
                     ->first();
    return view('admin.doctor.editdoctor')
             ->with('doctors', $doctors)
             ->with('departments', $departments) 
             ->with('bloodnames', $bloodnames);                  
  }

   public function DoctorUpdated(Request $request){
   	  $this->validate($request,[
         'dname' => 'required',
         'email' => 'required',
         'designation' => 'required',
         'address' => 'required',
         'mobile' => 'required',
         'shortbiography' => 'required',
         'specialist' => 'required',
         'batdate' => 'required',
          'degree' => 'required'

     	],
     	[
     	'dname.required' =>'Place Your Doctor Name!',
     	'email.required' =>'Place Your Doctor email!',
     	'designation.required' =>'Place Your designation!',
     	'address.required' =>'Place Your Address!',
     	'mobile.required' =>'Place Your Mobile!',
     	'shortbiography.required' =>'Place Your shortbiography!',
     	'specialist.required' =>'Place Your specialist!',
     	'batdate.required' =>'Place Your Date of Brith!',
     	'degree.required' =>'Place Your degree!'
     	]);


        $imageUrl = $this->imageExistStatus($request);
        echo $imageUrl;
        exit();
   }

       private function imageExistStatus($request) {
        $doctor = Doctor::where('id', $request->id)->first();
        $doctor->dname = $request->dname;
        $doctor->email = $request->email;
        $doctor->deprtId = $request->deprtId;
        $doctor->designation = $request->designation;
        $doctor->address = $request->address;
        $doctor->mobile = $request->mobile;
        $doctor->shortbiography = $request->shortbiography;
        $doctor->specialist = $request->specialist;
        $doctor->batdate = $request->batdate;
        $doctor->sex = $request->sex;
        $doctor->bloodId = $request->bloodId;
        $doctor->degree = $request->degree;
        $doctor->status = $request->status;
        $doctor->save();

        $image = $request->file('image');
        if ($image) {
            unlink($doctor->image);
            $name = $image->getClientOriginalName();
            $uploadPath = 'public/image/';
            $image->move($uploadPath, $name);
            $imageUrl = $uploadPath . $name;
        } else {
            $imageUrl = $doctor->image;
        }
        return $imageUrl;
    }

   public function DoctorDeleted($id){
    
   	DB::table('doctors')
   		->where('id', $id)
   		->delete();  
   return redirect('/doctorlist')->with('message', 'Doctor Deleted successfully');

   }
  


}
