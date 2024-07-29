<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parents;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function parent(){
        $parents = Parents::get()->toArray();
        return view('admin.quran.parent.parent')->with(compact('parents'));
    }

    public function addParent(Request $request){
        Session::put('page','Parents');
            $title = "Add Parent";
            $parent_father = new Parents;
            $parent_mother = new Parents;
            $message = "Parent Added successfully";
            if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'parent_first_name_father' => 'required',
                'parent_last_name_father' => 'required',
                'parent_mobile_father' => 'required|numeric',
                'sexe_father'=> 'required',
                'parent_profession_father' => 'required',
                'parent_first_name_mother' => 'required',
                'parent_last_name_mother' => 'required',
                'parent_mobile_mother' => 'required|numeric',
                'sexe_mother'=> 'required',
                'parent_profession_mother' => 'required'
            ];
    
               $customMessages = [
                "parent_first_name_father.required" => 'Fisrt name Father required',
                "parent_last_name_father.required" => 'Last name Father required',
                "parent_mobile_father.required" => 'Mobile Father required',
                "sexe_father.required" => 'Sexe Father required',
                'parent_profession_father' => 'Profession Father required',

                "parent_first_name_mother.required" => 'Fisrt name Mother required',
                "parent_last_name_mother.required" => 'Last name Mother required',
                "parent_mobile_mother.required" => 'Mobile Mother required',
                "sexe_mother.required" => 'Sexe Mother required',
                'parent_profession_mother' => 'Profession Mother required',
               ];
    
               $this->validate($request, $rules, $customMessages);
                
               // Upload Admin Photo
               
              
               $parent_father->first_name = $data['parent_first_name_father'];
               $parent_father->last_name = $data['parent_last_name_father'];
               $parent_father->mobile = $data['parent_mobile_father'];
               $parent_father->sexe = $data['sexe_father'];
               $parent_father->profession = $data['parent_profession_father' ];
               $parent_father->save();

               $parent_mother->first_name = $data['parent_first_name_mother'];
               $parent_mother->last_name = $data['parent_last_name_mother'];
               $parent_mother->mobile = $data['parent_mobile_mother'];
               $parent_mother->sexe = $data['sexe_mother'];
               $parent_mother->profession = $data['parent_profession_mother' ];
               $parent_mother->save();

               return redirect('admin/parent')->with('success_message',$message); 
            }  
        return view("admin.quran.parent.add_parent")->with(compact('title'));
    }
    public function editParent(Request $request, $id){
        Session::put('page','Parents');
        $title = "Edit Parent";
        $parent = Parents::find($id);
        $message = "Parent Editing successfully";
        if($request->isMethod("POST")){ 
        $data = $request->all();
       // echo "<pre>"; print_r($data); die; 

        $rules = [
            'parent_first_name' => 'required',
            'parent_last_name' => 'required',
            'parent_mobile' => 'required|numeric',
            'sexe'=> 'required',
            'parent_profession' => 'required',
        ];

           $customMessages = [
            "parent_first_name.required" => 'Fisrt name  required',
            "parent_last_name.required" => 'Last name  required',
            "parent_mobile.required" => 'Mobile  required',
            "sexe.required" => 'Sexe  required',
            'parent_profession' => 'Profession  required',

           ];

           $this->validate($request, $rules, $customMessages);
            
           // Upload Admin Photo
           
          
          $parent->first_name = $data['parent_first_name'];
           $parent->last_name = $data['parent_last_name'];
           $parent->mobile = $data['parent_mobile'];
           $parent->sexe = $data['sexe'];
           $parent->profession = $data['parent_profession'];
           $parent->update();

           
        return redirect('admin/parent')->with('success_message',$message); 
    
}

    return view("admin.quran.parent.edit_parent")->with(compact('title', 'parent'));
}


  public function deleteParent($id){
    $parent = Parents::find($id);
    $message = "Parent deleted successfully";
    $parent->delete();
    return redirect('admin/parent')->with('success_message',$message);
  }  
}
