<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Brand;
use App\Http\Requests\BrandRequest;

class brandController extends Controller
{
    public function add(){
        return view('backend.Brand.brandAdd');
    }



    public function store(Request $request){
        $request->validate([
            'brand' => 'required|unique:brands,brands_name|max:25'
        ]);
        $data = new Brand;
        $data->brands_name = $request->brand;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Brand Inserted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('brand.list')->with($notification);
    }




    public function list(){
        $brand = Brand::all();
        return view('backend.Brand.brandList', compact('brand'));
    }



    public function delete($id){
        $data = Brand::findorfail($id)->delete();
        if($data){
            $notification = array(
                'message' => 'Brand Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);;
    }





    public function edit($id){
        $brand = Brand::findorfail($id);
        return view('backend.Brand.brandEdit', compact('brand'));
    }



    public function update(BrandRequest $request, $id){
        $data = Brand::findorfail($id);
        $data->brands_name = $request->brand;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('brand.list')->with($notification);
    }

}
