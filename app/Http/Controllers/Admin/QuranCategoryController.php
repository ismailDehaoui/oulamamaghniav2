<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\quransCategoriesStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class QuranCategoryController extends Controller
{
    public function category(){
        Session::put('page','categories');
        $categories = quransCategoriesStudents::get()->toArray();
        return view('admin.quran.category.category')->with(compact('categories'));
    }

    public function addEditcategory(Request $request, $id=null){
        Session::put('page','categories');
        if($id==""){
            $title = "Add category";
            $category = new quransCategoriesStudents;
            $message = "Category Added successfully";
        }else{
            $title = "Edi category";
            $category = quransCategoriesStudents::find($id);
            $message = "Category Updated successfully";
        }
         if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'category_name' => 'required'
               ];
    
               $customMessages = [
                "category_name.required" => 'First name required',
                
                
               ];
    
               $this->validate($request, $rules, $customMessages);
               
               $category->name = $data['category_name'];
               $category->save();

               return redirect('admin/category')->with('success_message',$message);        }  
        return view("admin.quran.category.add_edit_category")->with(compact('title', 'category'));
    }
}
