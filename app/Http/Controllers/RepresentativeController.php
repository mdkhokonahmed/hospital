<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Representative;

class RepresentativeController extends Controller
{
    public function index(){
    	 $bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
    	 return view('admin.representative.addrepresentative')
    	        ->with('bloodnames', $bloodnames);
    }

   public function StoreRepresentative(Request $request){
   	   $this->validate($request,[
         'rname' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'batdate' => 'required',
         'address' => 'required',
         'image' => 'required'
     	],
     	[
     	'rname.required' =>'Place Your representative Name!',
     	'email.required' =>'Place Your representative email!',
     	'phone.required' =>'Place Your phone!',
     	'batdate.required' =>'Place Your Date of Brith!',
     	'address.required' =>'Place Your Address!',
     	'image.required' =>'Place Your Image!'
     
     	]);


   	     $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $uploadPath = 'public/image/';
        $image->move($uploadPath, $name);
        $imageUrl = $uploadPath . $name;

        $doctor = new Representative();
        $doctor->rname = $request->rname;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->bloodId = $request->bloodId;
        $doctor->sex = $request->sex;
        $doctor->batdate = $request->batdate;
        $doctor->address = $request->address;
        $doctor->image = $imageUrl;
        $doctor->status = $request->status;

        $doctor->save();
    return redirect('/addrepresentative')->with('message', 'Representative Added successfully');
   } 

  public function listrepresentative(){
  			$representatives = DB::table('representatives')
            ->join('blood', 'representatives.bloodId', '=', 'blood.id')
            ->select('representatives.*', 'blood.bloodname')
            ->orderBy('id', 'DESC')
            ->paginate(1);
            //->get();
  	 return view('admin.representative.listrepresentative')
  	             ->with('representatives', $representatives);
  }

  public function tablesearch(Request $request){
     $search = $request->search;
      $representatives = DB::table('representatives')
     ->Where('rname', 'like', '%'.$search.'%')
     ->orWhere('email', 'like', '%'.$search.'%')
     ->orWhere('phone', 'like', '%'.$search.'%')
     ->orWhere('sex', 'like', '%'.$search.'%')
     ->orWhere('address', 'like', '%'.$search.'%')
      ->paginate(1);
    // ->get();

     return view('admin.representative.listrepresentative')
                ->with('representatives', $representatives);
  }

  public function EditRepresentative($id){
  	$bloodnames = DB::table('blood')->select('id', 'id', 'bloodname', 'bloodname')->get();
  	$represenById = DB::table('representatives')
            ->where('id', $id)
            ->first();
  	return view('admin.representative.editrepresentative')
  				->with('represenById', $represenById)
  				->with('bloodnames', $bloodnames);	            
  }

  public function UpdateRepresentative(Request $request){
  	  $this->validate($request,[
         'rname' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'batdate' => 'required',
         'address' => 'required',
         'image' => 'required'
     	],
     	[
     	'rname.required' =>'Place Your representative Name!',
     	'email.required' =>'Place Your representative email!',
     	'phone.required' =>'Place Your phone!',
     	'batdate.required' =>'Place Your Date of Brith!',
     	'address.required' =>'Place Your Address!',
     	'image.required' =>'Place Your Image!'
     
     	]);

  	 $imageUrl = $this->imageExistStatus($request);
        echo $imageUrl;
        exit();
  }



       private function imageExistStatus($request) {
        $doctor = Representative::find($request->id);
        $doctor->rname = $request->rname;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->bloodId = $request->bloodId;
        $doctor->sex = $request->sex;
        $doctor->batdate = $request->batdate;
        $doctor->address = $request->address;
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

  public function DeleteRepresentative($id){
  		DB::table('representatives')
   		->where('id', $id)
   		->delete();  
   return redirect('/listrepresentative')->with('message', 'Representatives Deleted successfully');
  }

 




}
