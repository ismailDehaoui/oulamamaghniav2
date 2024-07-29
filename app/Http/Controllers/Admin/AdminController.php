<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\quransCategoriesStudents;
use App\Models\Secretary;
use App\Models\TeachersQurans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard(){
       // echo $password = Hash::make('AhmeD95IsSou'); die;
       //$cat = quransCategoriesStudents::getCategory();
       $secretary = Secretary::with('quransCategoriesStudents')->find(auth()->id());
       dd($secretary);
        return view('admin.dashboard');
    }

    public function upadateAdminPassword(Request $request){
        if($request->isMethod('POST') ){
            $data = $request->all();
           // echo '<pre>'; print_r($data); die();
            // Check if current password enterted by admin is correct
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
                // Check if new password is matching with confirl password
                if($data['confirm_password'] == $data['new_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Password has been update successfully!');
                }else{
                    return redirect()->back()->with('error_message','New Password and Confirm Password dose not match!');
                }
            }else{
                return redirect()->back()->with('error_message','Your current password is incorrect!');
            }    
        }
        $adimDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adimDetails'));
    }
   
    public function checkAdminPassword(Request $request){
       $data = $request->all();
    //    echo "<pre>"; print_r($data); die;
    if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
        return "true";
    }
    else { return "false"; }

    }

    public function upadateAdminDetails(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            
           // echo "<pre>"; print_r($data); die;
           
           $rules = [
            'admin_first_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'admin_last_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'admin_mobile' => 'required|numeric',
           ];

           $customMessages = [
            "admin_last_name.required" => 'Last Name Required',
            "admin_last_name.regex" => 'Valid Last Name Is Required',
            "admin_first_name.required" => 'First name required',
            "admin_first_name.regex" => 'Valid First Name Is Required',
            "admin_mobile.numeric" => 'Valid Mobile Is Required',
           ];

           $this->validate($request, $rules, $customMessages);
           
           // Upload Admin Photo
           if($request->hasFile('admin_image')){
            $image_tmp = $request->file('admin_image'); 

            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/photos/'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_admin_image'])){
            $imageName = $data['current_admin_image'];
           }else{
            $imageName = "";
           }
           
           
           // Update Admin Details
           Admin::where(
                'id',
                Auth::guard('admin')->user()->id)->update([
                    'first_name' =>$data['admin_first_name'],
                    'last_name' =>$data['admin_last_name'],
                    'mobile' =>$data['admin_mobile'],
                    'image' => $imageName,
                ]
            );
            return redirect()->back()->with('success_message','Admin details updated successfully!');


        }
        return view('admin.settings.update_admin_details');
    }

    public function login(Request $request){
        //echo $password = Hash::make('A@yoUb95IsSou');
        if($request->isMethod('POST')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            
            $rules = [
                'email' => 'required| email| max: 255 ',
                'password' => 'required'
            ];

            $customMessage = [

                "email.required" => "Email  is required!!",
                "email.email" => "Valid Email is required",
                "password.required" => "Password is required!!",

            ];
            $this->validate($request, $rules, $customMessage);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password'=> $data['password'], 'status'=>1])){
                return redirect('admin/dashboard');                
            }else{
                return redirect()->back()->with('error_message','Invalid email or password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function upadateQuranTeacherDetails($slug){
        if($slug == "personal"){
            $quranTeacherDetails = TeachersQurans::where('id',Auth::guard('admin')->user()->quran_teacher_id)->first()->toArray();
        }else if($slug == "daily-calendar"){

        }else if($slug == "publication"){

        }
        return view('admin.settings.quran_teachers.update_quran_teacher_details')->with(compact('slug','quranTeacherDetails'));

    }

   
}
