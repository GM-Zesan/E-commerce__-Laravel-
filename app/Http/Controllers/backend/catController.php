<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Category;
use App\Http\Requests\CategoryRequest;
use DB;
class catController extends Controller{


    
    public function addCategory(){
        return view('backend.Category.categoryAdd');
    }




    public function storeCategory(Request $request){
        $this->validate($request,[
            'category' => 'required|unique:categories,categories_name|max:25',
            'slug' => 'required|unique:categories,categories_slug|max:25',
        ]);
        $data = new Category;
        $data->categories_name = $request->category;
        $data->categories_slug = $request->slug;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Category Inserted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('category.list')->with($notification);
    }





    public function listCategory(){
        $cat = Category::all();
        return view('backend.Category.categoryList', compact('cat'));
    }






    public function viewCategory($id){
        $cat = Category::findorfail($id);
        return view('backend.Category.categoryView', compact('cat'));
    }





    public function deleteCategory($id){
        Category::findorfail($id)->delete();
        return redirect()->back();
    }





    public function editCategory($id){
        $cat = Category::findorfail($id);
        return view('backend.Category.categoryEdit', compact('cat'));
    }





    public function updateCategory(CategoryRequest $request, $id){
        $data = Category::findorfail($id);
        $data->categories_name = $request->category;
        $data->categories_slug = $request->slug;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('category.list')->with($notification);
    }
}
