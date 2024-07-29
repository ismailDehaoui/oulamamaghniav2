<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SchoolController extends Controller
{
    public function school(){
        $schools = School::get()->toArray();
        return view('admin.quran.school.school')->with(compact('schools'));
    }

    public function addEditSchool(Request $request, $id=null){
        Session::put('page','schools');
        if($id==""){
            $title = "Add school";
            $school = new School;
            $message = "School Added successfully";
        }else{
            $title = "Edit school";
            $school = School::find($id);
            $message = "School Updated successfully";
        }
         if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'school_name' => 'required',
                'school_address'=> 'required',
                'school_description'=> 'required',
                'school_mobile' => 'required|numeric',
                'email' => 'required|email',
               ];
    
               $customMessages = [
                "school_name.required" => 'School name required',
                "school_address.required" => 'School address required',
                "school_description.required" => 'School description required',
                "school_mobile.required" => 'School mobile required',
                "email.required" => 'School email required',
                
               ];
    
               $this->validate($request, $rules, $customMessages);
                
               // Upload Admin Photo
           if($request->hasFile('school_image')){
            $image_tmp = $request->file('school_image'); 

            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/photos/school'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_school_image'])){
            $imageName = $data['current_school_image'];
           }else{
            $imageName = "";
           }
               
               $school->school_name = $data['school_name'];
               $school->school_address = $data['school_address'];
               $school->school_description = $data['school_description'];
               $school->school_mobile = $data['school_mobile'];
               $school->email  = $data['email'];
               $school->school_image = $imageName;
               $school->save();

               return redirect('admin/school')->with('success_message',$message);        }  
        return view("admin.quran.school.add_edit_school")->with(compact('title', 'school'));
    }
}
