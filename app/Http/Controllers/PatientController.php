<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PatientController extends Controller
{
    public function addpatient(){
    $bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
    return view('admin.patient.addpatient')
    			->with('bloodnames', $bloodnames);
    }

    public function StorePatient(Request $request){
    
        $this->validate($request,[
         'patientname' => 'required',
         'mobile' => 'required',
         'bloodId' => 'required',
         'address' => 'required',
         'image' => 'required',
         'sex' => 'required',
         'batdate' => 'required',
         'status' => 'required',

     	],
     	[
     	'patientname.required' =>'Place Your Name!',
     	'mobile.required' =>'Place Your Mobile number!',
     	'bloodId.required' =>'Place Your Blade Group!',
     	'address.required' =>'Place Your Address!',
     	'image.required' =>'Place Your Image!',
     	'sex.required' =>'Place Your Gander!',
     	'batdate.required' =>'Place Your Date of Bath!',
     	'status.required' =>'Place Your status!',
     	]);

     	$data = array();
     	$data['patientname'] = $request->patientname;
     	$data['mobile'] = $request->mobile;
     	$data['bloodId'] = $request->bloodId;
     	$data['address'] = $request->address;
     	$data['sex'] = $request->sex;
     	$data['batdate'] = $request->batdate;
     	$data['status'] = $request->status;

        $image = $request->file('image');
    	 if ($image) {
    	 	$image_name = str_random(10);
    	 	$text = strtolower($image->getClientOriginalName());
    	 	$image_full_name = $image_name.'.'.$text;
    	 	$uploadPath = 'public/image/';
    	 	$image_url = $uploadPath.$image_full_name;
    	 	$success = $image->move($uploadPath,$image_full_name);
    	 	if ($success) {
    	 		$data['image'] = $image_url;
    	 		DB::table('patient')->insert($data);
                  return redirect('/addpatient')->with('message', 'patient Added successfully');    
    	 	}else{
               $data['image'] = $image_url;
                DB::table('patient')->insert($data); 
                return redirect('/addpatient')->with('message', 'patient Added successfully');  
            }
    	 }
     
    }

    public function listPatient(){
    	$patients = DB::table('patient')
            ->join('blood', 'patient.bloodId', '=', 'blood.id')
            ->select('patient.*', 'blood.bloodname')
            ->orderBy('id', 'DESC')
            ->get();
      return view('admin.patient.listpatient')
      			->with('patients', $patients);
    }

    public function editPatient($id){
    	$bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
     $patientsbyid = DB::table('patient')
     			     ->where('id', $id)
     			     ->first();
     	 return view('admin.patient.editpatient')
     	      ->with('patientsbyid', $patientsbyid)
      		  ->with('bloodnames', $bloodnames);		     
    }

   public function UpdatePatient(Request $request){
         $this->validate($request,[
         'patientname' => 'required',
         'mobile' => 'required',
         'bloodId' => 'required',
         'address' => 'required',
         'sex' => 'required',
         'batdate' => 'required',
         'status' => 'required'

        ],
        [
        'patientname.required' =>'Place Your Name!',
        'mobile.required' =>'Place Your Mobile number!',
        'bloodId.required' =>'Place Your Blade Group!',
        'address.required' =>'Place Your Address!',
        'image.required' =>'Place Your Image!',
        'sex.required' =>'Place Your Gander!',
        'batdate.required' =>'Place Your Date of Bath!',
        'status.required' =>'Place Your status!'
        ]);

        $data = array();
        $id = $request->id;
        $data['patientname'] = $request->patientname;
        $data['mobile'] = $request->mobile;
        $data['bloodId'] = $request->bloodId;
        $data['address'] = $request->address;
        $data['sex'] = $request->sex;
        $data['batdate'] = $request->batdate;
        $data['status'] = $request->status;

        $image = $request->file('image');
         if ($image) {
            $image_name = str_random(10);
            $text = strtolower($image->getClientOriginalName());
            $image_full_name = $image_name.'.'.$text;
            $uploadPath = 'public/image/';
            $image_url = $uploadPath.$image_full_name;
            $success = $image->move($uploadPath,$image_full_name);
          if ($success) {
                  $data['image'] = $image_url;
                    DB::table('patient')
                     ->where('id', $id)
                     ->update($data);
                 unlink($request->old_image); 
                  return redirect('/listpatient')->with('message', 'patient Updated successfully');   
          }else{
            $data['image'] = $image_url;
                    DB::table('patient')
                     ->where('id', $id)
                     ->update($data); 
                return redirect('/listpatient')->with('message', 'patient Updated successfully');
          }

         } 
  

   return redirect('/listPatient')->with('message', 'patient Updated successfully');         
}

 public function DeletePatient($id){
    DB::table('patient')
        ->where('id', $id)
        ->delete();
    return redirect('/listPatient')->with('message', 'patient Deleted successfully');     
 }


}
