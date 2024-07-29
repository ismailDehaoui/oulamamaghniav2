<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeachersQurans;
use App\Models\quransCategoriesStudents;
use App\Models\School;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;



class QuranTeacherController extends Controller
{
    public function quran_teacher(){
        $teachers = TeachersQurans::get()->toArray();
        return view('admin.quran.teacher.teacher')->with(compact('teachers'));
    }

    public function upadateQuran_TeacherPassword(Request $request){
        if($request->isMethod('POST') ){
            $data = $request->all();
           // echo '<pre>'; print_r($data); die();
            // Check if current password enterted by Quran_Teacher is correct
            if(Hash::check($data['current_password'],Auth::guard('Quran_Teacher')->user()->password)){
                // Check if new password is matching with confirl password
                if($data['confirm_password'] == $data['new_password']){
                    TeachersQurans::where('id',Auth::guard('Quran_Teacher')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Password has been update successfully!');
                }else{
                    return redirect()->back()->with('error_message','New Password and Confirm Password dose not match!');
                }
            }else{
                return redirect()->back()->with('error_message','Your current password is incorrect!');
            }    
        }
        $adimDetails = TeachersQurans::where('email', Auth::guard('Quran_Teacher')->user()->email)->first()->toArray();
        return view('admin.settings.update_Quran_Teacher_password')->with(compact('adimDetails'));
    }

    
    public function addEditQuranTeacher(Request $request, $id=null){
        Session::put('page','teachers');
        if($id==""){
            $categories = quransCategoriesStudents::get()->toArray();
            $schools = School::get()->toArray();
            $title = "Add Quran Teacher";
            $quran_teacher = new TeachersQurans;
            $admin = new Admin;
            $message = "Quran Teacher Added successfully";
        }else{
            $categories = quransCategoriesStudents::get()->toArray();
            $schools = School::get()->toArray();
            $admin = Admin::find($id);
            $title = "Edit Quran Teacher";
            $quran_teacher = TeachersQurans::find($id);
            $message = "Quran Teacher Updated successfully";
        }
         if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'quran_teacher_first_name' => 'required',
                'quran_teacher_last_name' => 'required',
                'quran_teacher_address'=> 'required',
                'quran_teacher_mobile' => 'required|numeric',
                'email' => 'required|email',
                'quran_teacher_password' => 'required',
               ];
    
               $customMessages = [
                "quran_teacher_first_name.required" => 'Fisrt name required',
                "quran_teacher_last_name.required" => 'Last name required',
                "quran_teacher_address.required" => 'Address required',
                "quran_teacher_mobile.required" => 'Mobile required',
                "email.required" => 'Email required',
                "quran_teacher_password" => "Password required",
               ];
    
               $this->validate($request, $rules, $customMessages);
                
               // Upload Admin Photo
           if($request->hasFile('quran_teacher_image')){
            $image_tmp = $request->file('quran_teacher_image'); 

            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/photos/quran_teacher/'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_quran_teacher_image'])){
            $imageName = $data['current_quran_teacher_image'];
           }else{
            $imageName = "";
           }
               
           $existingEmail = TeachersQurans::where('email',$data['email'] )->first();
           $existingEmailAdmin = Admin::where('email',$data['email'] )->first();
           $existingMobile = TeachersQurans::where('mobile',$data['quran_teacher_mobile'] )->first();
           $existingMobileAdmin = Admin::where('mobile',$data['quran_teacher_mobile'] )->first();
           if($existingEmail || $existingEmailAdmin || $existingMobile || $existingMobileAdmin){
            return redirect('admin/add-edit-quran-teacher')->with('error_message', 'Email or Mobile already exists in the database');

           }else{
               $quran_teacher->qurans_categories_teachers_id  = $data['category'];
               $quran_teacher->quran_shcool_id  = $data['school'];
               $quran_teacher->first_name = $data['quran_teacher_first_name'];
               $quran_teacher->last_name = $data['quran_teacher_last_name'];
               $quran_teacher->address = $data['quran_teacher_address'];
               $quran_teacher->mobile = $data['quran_teacher_mobile'];
               $quran_teacher->email  = $data['email'];
               $quran_teacher->password  = Hash::make($data['quran_teacher_password']);
               $quran_teacher->image = $imageName;
               $quran_teacher->status = 1;
              
               $quran_teacher->save();


               $admin->first_name= $data['quran_teacher_first_name'];
               $admin->last_name = $data['quran_teacher_last_name'];
    
               $admin->type = "Quran Teacher";
               $admin->quran_teacher_id	= $quran_teacher->id;
               $admin->secretary_id = 0; 
               $admin->mobile =   $quran_teacher->mobile = $data['quran_teacher_mobile'];
               $admin->email  =  $quran_teacher->email  = $data['email'];
               $admin->password = Hash::make($data['quran_teacher_password']);
               $admin->image = $imageName;
               $admin->status= 1;
               $admin->save();
               return redirect('admin/quran-teacher')->with('success_message',$message);
            }
            }  
       
               return view("admin.quran.teacher.add_edit_quran_teacher")->with(compact('title', 'quran_teacher','categories','schools'));
    }

    public function delete($id){
        $secretary = TeachersQurans::find($id);
        if(!$secretary){
            return redirect('admin/quran-teacher')->with('error_message','teacher not found');
            ;
        }
        $secretary->delete();

        return redirect('admin/quran-teacher')->with('success_message', 'Member Secretary successfully');
    }
    
}
