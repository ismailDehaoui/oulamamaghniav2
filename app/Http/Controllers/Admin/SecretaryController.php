<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Secretary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\School;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class SecretaryController extends Controller
{
    public function secretary(){
        $secretaries = Secretary::get()->toArray();
        return view('admin.quran.secretary.secretary')->with(compact('secretaries'));
    }

    public function addSecretary(Request $request, $id=null){
        Session::put('page','secretaries');
            $schools = School::get()->toArray();
            $title = "Add Secretary";
            $secretary = new Secretary;
            $admin = new Admin;
            $message = "Secretary Added successfully";
         if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'secretary_first_name' => 'required',
                'secretary_last_name' => 'required',
                'secretary_address'=> 'required',
                'secretary_mobile' => 'required|numeric',
                'email' => 'required|email',
                'secretary_password' => 'required',
               ];
    
               $customMessages = [
                "secretary_first_name.required" => 'Fisrt name required',
                "secretary_last_name.required" => 'Last name required',
                "secretary_address.required" => 'Address required',
                "secretary_mobile.required" => 'Mobile required',
                "email.required" => 'Email required',
                "secretary_password" => "Password required",
               ];
    
               $this->validate($request, $rules, $customMessages);
                
               // Upload Admin Photo
           if($request->hasFile('secretary_image')){
            $image_tmp = $request->file('secretary_image'); 

            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/photos/secretary/'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_secretary_image'])){
            $imageName = $data['current_secretary_image'];
           }else{
            $imageName = "";
           }
           
           $existingEmail = Secretary::where('email',$data['email'])->first();
           $existingMobile = Secretary::where('mobile',$data['secretary_mobile'])->first();
           $existingEmailAdmin = Admin::where('email',$data['email'])->first();
           if($existingEmail || $existingMobile || $existingEmailAdmin){
            return redirect('admin/add-secretary')->with('error_message', 'Email or Mobile already exists in the database');
           }else{
            $secretary->quran_shcool_id  = $data['school'];
               $secretary->first_name = $data['secretary_first_name'];
               $secretary->last_name = $data['secretary_last_name'];
               $secretary->address = $data['secretary_address'];
               $secretary->mobile = $data['secretary_mobile'];
               $secretary->email  = $data['email'];
               $secretary->password  = Hash::make($data['secretary_password']);
               $secretary->image = $imageName;
               $secretary->status = 1;
              
               $secretary->save();


               $admin->first_name= $data['secretary_first_name'];
               $admin->last_name = $data['secretary_last_name'];
               $admin->type = "Secretary";
               $admin->secretary_id	= $secretary->id;
               $admin->quran_teacher_id	 = 0;
               $admin->mobile =   $secretary->mobile = $data['secretary_mobile'];
               $admin->email  =  $secretary->email  = $data['email'];
               $admin->password = Hash::make($data['secretary_password']);
               $admin->image = $imageName;
               $admin->status= 1;
               $admin->save();
               return redirect('admin/secretary')->with('success_message',$message);
           }
        }  
        return view("admin.quran.secretary.add_secretary")->with(compact('title', 'secretary','schools'));
    }


    public function delete($id){
        $secretary = Secretary::find($id);
        if(!$secretary){
            return redirect('admin/secretary')->with('error_message','Secretary not found');
            ;
        }
        $secretary->delete();

        return redirect('admin/secretary')->with('success_message', 'Member Secretary successfully');
    }
}
