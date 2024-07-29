<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\QuranStudants;
use App\Models\School;
use App\Models\quransCategoriesStudents;
use App\Models\QuranSubcription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DateTime;

class QuranStudentController extends Controller
{
    public function quran_student(){
        $quran_students = QuranStudants::get()->toArray();
        return view('admin.quran.student.student')->with(compact('quran_students'));
    }

    public function addQuranStudent(Request $request){
        Session::put('page','students');
        
            $subscriptions = new QuranSubcription;
            $categories = quransCategoriesStudents::get()->toArray();
            $schools = School::get()->toArray();
            
            $parentFathers = Parents::where('sexe', 'male')->get(['id','first_name', 'last_name']);
            $parentMothers = Parents::where('sexe', 'female')->get(['id','first_name', 'last_name']);
            
            $title = "Add Quran Student";
            $quran_student = new QuranStudants;
            $message = "Quran Student Added successfully";
            if($request->isMethod("POST")){ 
            $data = $request->all();
           //echo "<pre>"; print_r($data); die; 

            $rules = [
                'quran_student_first_name' => 'required',
                'quran_student_last_name' => 'required',
                'sexe'=> 'required',
                'quran_student_date_of_birthday' => 'required',
                "beneficiaire" => "required",
                "date_subscription" => "required",
                'father' => 'required',
                'mother' => 'required',
                "statut" => "required",
                "statut_familly" => "required",
                "disease" =>  "required",
                "category" => "required",
                "school" => "required",
                "quran_student_N_parties_the_Koran"=> "required",
                "quran_student_image" => "required|image|mimes:png,jpeg,jpg",
                "birth_certificate" => "required|file|mimes:pdf"
               ];
    
               $customMessages = [
                "quran_student_first_name.required" => 'Fisrt name required',
                "quran_student_last_name.required" => 'Last name required',
                "sexe.required" => 'Sexe required',
                "quran_student_date_of_birthday.required" => ' birth date required',
                'beneficiaire'=> ' beneficiaire required',
                "date_subscribed" => 'Date Subscribed required',
                "father.required" => 'Father name required',
                "mother.required" => 'Mother name required',
                "statut.required" => 'Statut required',
                "statut_familly.required" => 'Statut Familly required',
                "disease.required" => 'Disease required',
                "category.required" => 'Category required',
                "school.required" => 'School required',
                "quran_student_N_parties_the_Koran.required" => 'N° Parties the Quran required',
                "quran_student_image.required" => 'Image required : PNG or JPEG orJPG',
                "birth_certificate.required" => 'Birth certificate required : PDF',
               ];
    
               $this->validate($request, $rules, $customMessages);
                
               // Upload Admin Photo
           if($request->hasFile('quran_student_image')){
            $image_tmp = $request->file('quran_student_image'); 

            if($image_tmp->isValid()){
                $image_tmp = $request->file('quran_student_image'); 

                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/photos/quran_student/'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_quran_student_image'])){
            $imageName = $data['current_quran_student_image'];
           }else{
            $imageName = "";
           }


           if($request->hasFile('birth_certificate')){
            $birth_certificate = $request->file('birth_certificate'); 

            if($birth_certificate->isValid()){
                 $extension = $birth_certificate->getClientOriginalExtension(); 
                // // Generate New Image Extension
                 $birthCertificateName = rand(111,9999).'.'.$extension; 
                 $birthCertificatePath = 'admin/birth_certificate/'.$birthCertificateName; 
                // // Upload the Image 
                // Image::make($birth_certificate)->save($birthCertificatePath);
                $file = $request->file('birth_certificate');

                $fileName = $file->getClientOriginalName(); // اسم الملف الأصلي
                if($file->move('admin/birth_certificate', $birthCertificateName)){
                    echo "File uploaded successfully";
                }else{
                    echo "Failure to upload file";
                }
                //Storage::putFileAs('uploads', $file, $fileName); 
            }
           }else if(!empty($data['current_quran_student_birth_certificate'])){
            $birthCertificateName = $data['current_quran_student_birth_certificate'];
           }else{
            $birthCertificateName = "";
           }
               


            $quran_student->firstName = $data['quran_student_first_name'];
            $quran_student->lastName = $data['quran_student_last_name'];
            $quran_student->sexe = $data['sexe'];
            $quran_student->dateOfBirthday = $data['quran_student_date_of_birthday'];
            $quran_student->statut  = $data['statut'];  
            $quran_student->malad = $data['disease'];
            if($data['disease'] == 'yes'){
                $quran_student->type_malade = $data['typeDisease'];
            }else{
                $quran_student->type_malade = "معفا و الحمد لله ";
            }

            $quran_student->quran_category_student_id  = $data['category'];
            $quran_student->quran_shcool_id  = $data['school'];
            $quran_student->father_id  = $data['father'];
            $quran_student->mother_id = $data['mother'];
            $quran_student->statut_familly = $data['statut_familly'];
            $quran_student->N_parties_the_Koran = $data['quran_student_N_parties_the_Koran'];
            if($data['quran_student_N_parties_the_Koran'] == 60){
                $quran_student->current_party = 60;    
            }else{
            $quran_student->current_party = $data['quran_student_N_parties_the_Koran']-1;
        }
            $quran_student->image = $imageName;
            $quran_student->birth_certificate = $birthCertificateName;  
            $quran_student->save();

            $dateS = new DateTime($data['date_subscription']);
            $dateS->modify('+1 month'); // Add one month to the date
            $nextM = $dateS->format('Y-m-d'); // Convert the modified date to a string in the desired format

            //echo "<pre>"; print_r($data['beneficiaire']); die; 
            $subscriptions->beneficiaire = $data['beneficiaire']; 
            $subscriptions->date_subscription = $data['date_subscription'];
            $subscriptions->date_start = $dateS->format('Y-m-d');
            $subscriptions->next_date_renewal = $nextM; 
            $subscriptions->date_renewal = $nextM; 
            $subscriptions->status = 1;  
            if($data['beneficiaire'] == 'yes'){
                $subscriptions->price = 0;
            }else{
               $subscriptions->price = $data['pric_of_subcription'];
            }
            if($data['insurance'] == 'yes'){
                $subscriptions->insurance= 200;
            }else{
                $subscriptions->insurance= 0;
            }
            $subscriptions->quran_student_id  = $quran_student->id;
            $subscriptions->save();
            

               
             return redirect('admin/quran-student')->with('success_message',$message); 
       }  
        return view("admin.quran.student.add_quran_student")->with(compact('title', 'quran_student','categories','schools','parentFathers','parentMothers'));
    }

    public function editQuranStudent(Request $request, $id){
        
        $title = "Edit Quran Student";
        $quran_student = QuranStudants::find($id);
        $categories = quransCategoriesStudents::get()->toArray();
        //$category = quransCategoriesStudents::find($quran_student->quran_category_student_id);
        $category = quransCategoriesStudents::find($quran_student->quran_category_student_id);
        $schools = School::get()->toArray();
        $school = School::find($quran_student->quran_shcool_id);
        //dd($school);
            $fathers = Parents::where('sexe', 'male')->get(['id','first_name', 'last_name']);
        $father = Parents::find($quran_student->father_id );
       // dd($father);
        $mothers = Parents::where('sexe', 'female')->get(['id','first_name', 'last_name']);
        $mother = Parents::find($quran_student->mother_id);
        $subscriptions = QuranSubcription::where('quran_student_id',$quran_student->id)->get(['id', 'price', 'insurance', 'beneficiaire', 'date_subscription']);
       // dd($subscriptions);
        $message = "Quran Student Editing successfully";
        if($request->isMethod("POST")){ 
        $data = $request->all();
     //   echo "<pre>"; print_r($data); die; 

        $rules = [
            'quran_student_first_name' => 'required',
            'quran_student_last_name' => 'required',
            'sexe'=> 'required',
            'quran_student_date_of_birthday' => 'required',
            "beneficiaire" => "required",
            "date_subscription" => "required",
            'father' => 'required',
            'mother' => 'required',
            "statut" => "required",
            "statut_familly" => "required",
            "disease" =>  "required",
            "category" => "required",
            "school" => "required",
            "quran_student_N_parties_the_Koran"=> "required",
            "quran_student_current_party"=> "required"
           ];

           $customMessages = [
            "quran_student_first_name.required" => 'Fisrt name required',
            "quran_student_last_name.required" => 'Last name required',
            "sexe.required" => 'Sexe required',
            "quran_student_date_of_birthday.required" => ' birth date required',
            'beneficiaire'=> ' beneficiaire required',
            "date_subscribed" => 'Date Subscribed required',
            "father.required" => 'Father name required',
            "mother.required" => 'Mother name required',
            "statut.required" => 'Statut required',
            "statut_familly.required" => 'Statut Familly required',
            "disease.required" => 'Disease required',
            "category.required" => 'Category required',
            "school.required" => 'School required',
            "quran_student_N_parties_the_Koran.required" => 'N°Parties the Quran required',
            "quran_student_current_party" => "Current party required",
           ];

           $this->validate($request, $rules, $customMessages);
            
           // Upload Admin Photo
       if($request->hasFile('quran_student_image')){
        $image_tmp = $request->file('quran_student_image'); 

        if($image_tmp->isValid()){
            // Get Image Extension
            $extension = $image_tmp->getClientOriginalExtension(); 
            // Generate New Image Extension
            $imageName = rand(111,9999).'.'.$extension; 
            $imagePath = 'admin/images/photos/quran_student/'.$imageName; 
            // Upload the Image 
            Image::make($image_tmp)->save($imagePath);
        }
       }else if(!empty($data['current_quran_student_image'])){
        $imageName = $data['current_quran_student_image'];
       }else{
        $imageName = "";
       }


       if($request->hasFile('birth_certificate')){
        $birth_certificate = $request->file('birth_certificate'); 

        if($birth_certificate->isValid()){
            // Get Image Extension
            $extension = $birth_certificate->getClientOriginalExtension(); 
            // Generate New Image Extension
            $birthCertificateName = rand(111,9999).'.'.$extension; 
            $birthCertificatePath = 'admin/birth_certificate/'.$birthCertificateName; 
            // Upload the Image 
            Image::make($birth_certificate)->save($birthCertificatePath);
        }
       }else if(!empty($data['current_quran_student_birth_certificate'])){
        $birthCertificateName = $data['current_quran_student_birth_certificate'];
       }else{
        $birthCertificateName = "";
       }
           


        $quran_student->firstName = $data['quran_student_first_name'];
        $quran_student->lastName = $data['quran_student_last_name'];
        $quran_student->sexe = $data['sexe'];
        $quran_student->dateOfBirthday = $data['quran_student_date_of_birthday'];
        $quran_student->statut  = $data['statut'];  
        $quran_student->malad = $data['disease'];
        if($data['disease'] == 'yes'){
            $quran_student->type_malade = $data['typeDisease'];
        }else{
            $quran_student->type_malade = "معفا و الحمد لله ";
        }


        $quran_student->quran_category_student_id  = $data['category'];
        $quran_student->quran_shcool_id  = $data['school'];
        $quran_student->father_id  = $data['father'];
        $quran_student->mother_id = $data['mother'];
        $quran_student->statut_familly = $data['statut_familly'];
        $quran_student->N_parties_the_Koran = $data['quran_student_N_parties_the_Koran'];
        $quran_student->current_party = $data['quran_student_current_party'];
        $quran_student->image = $imageName;
        $quran_student->birth_certificate = $birthCertificateName;  
        $quran_student->update();

        $dateS = new DateTime($data['date_subscription']);
        $dateS->modify('+1 month'); // Add one month to the date
        $nextM = $dateS->format('Y-m-d'); // Convert the modified date to a string in the desired format

        //echo "<pre>"; print_r($data['beneficiaire']); die; 
        foreach($subscriptions as $subscription){
            $subscription->beneficiaire = $data['beneficiaire']; 
            $subscription->date_subscription = $dateS->format('Y-m-d');
            $subscription->date_start = $dateS->format('Y-m-d');
            $subscription->next_date_renewal = $nextM; 
            $subscription->date_renewal = $nextM; 
            $subscription->status = 1;  
            if($data['beneficiaire'] == 'yes'){
                $subscription->price = 0;
            }else{
            $subscription->price = $data['pric_of_subcription'];
            }
            if($data['insurance'] == 'yes'){
                $subscription->insurance= 200;
            }else{
                $subscription->insurance= 0;
            }
            $subscription->quran_student_id  = $quran_student->id;
            $subscription->update();
        }
        
       

           
         return redirect('admin/quran-student')->with('success_message',$message); 
   }  
       
       return view("admin.quran.student.edit_quran_student")->with(compact('title', 'quran_student','categories','category','schools','school','fathers','mothers','subscriptions','father','mother' ));
    }

    public function profile($id){
        $student = QuranStudants::find($id);
        $category = quransCategoriesStudents::find($student->quran_category_student_id);
        $school = School::find($student->quran_shcool_id);
        $father = Parents::find($student->father_id );
        $mother = Parents::find($student->mother_id);
        return view("admin.quran.student.porfile")->with(compact('student','category','school','father','mother'));
    }

    public function deleteQuranStudent($id){
        $student = QuranStudants::find($id);
        $subscriptions = QuranSubcription::where('quran_student_id',$student->id)->get(['id']);
       //$sub = QuranSubcription::find($subscription->id);
        $student->delete();
        foreach($subscriptions as $subscription){
            $subscription->delete();
        }
        $message = "Student Delete Successfully";
        return redirect('admin/quran-student')->with('success_message',$message);
    }
}
