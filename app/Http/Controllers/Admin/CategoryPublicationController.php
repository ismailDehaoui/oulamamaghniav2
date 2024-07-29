<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriesPablication;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CategoryPublicationController extends Controller
{
    public function category(){
        Session::put('page','categories');
        $categories = CategoriesPablication::get()->toArray();
        return view('admin.publications.category.category')->with(compact('categories'));
    }

    public function addEditcategory(Request $request, $id=null){
        Session::put('page','categories');
        if($id==""){
            $title = "Add category";
            $category = new CategoriesPablication;
            $message = "Category Added successfully";
        }else{
            $title = "Edi category";
            $category = CategoriesPablication::find($id);
            $message = "Category Updated successfully";
        }
         if($request->isMethod("POST")){ 
            $data = $request->all();
            //echo "<pre>"; print_r($data); die; 

            $rules = [
                'category_name' => 'required',
                'category_description' => 'required',
               ];
    
               $customMessages = [
                "category_name.required" => 'Category name required',
                "category_description.required" => "Category description required",                
               ];
    
               $this->validate($request, $rules, $customMessages);
               
                              // Upload Admin Photo
           if($request->hasFile('category_image')){
            $image_tmp = $request->file('category_image'); 

            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension(); 
                // Generate New Image Extension
                $imageName = rand(111,9999).'.'.$extension; 
                $imagePath = 'admin/images/publicatios/categories/'.$imageName; 
                // Upload the Image 
                Image::make($image_tmp)->save($imagePath);
            }
           }else if(!empty($data['current_category_image'])){
            $imageName = $data['current_category_image'];
           }else{
            $imageName = "";
           }
               $category->name = $data['category_name'];
               $category->name = $data['category_name'];
               $category->name = $data['category_name'];
               $category->save();

               return redirect('admin/category')->with('success_message',$message);        }  
        return view("admin.quran.category.add_edit_category")->with(compact('title', 'category'));
    }
}
