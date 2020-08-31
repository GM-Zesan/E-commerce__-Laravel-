<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Size;
use App\Http\Requests\SizeRequest;

class sizeController extends Controller
{
    public function add(){
        return view('backend.Size.sizeAdd');
    }


    public function store(Request $request){
        $this->validate($request,[
            'size' => 'required|unique:sizes,sizes_name|max:25'
        ]);
        $data = new Size;
        $data->sizes_name = $request->size;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Size Inserted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('size.list')->with($notification);
    }



    public function list(){
        $size = Size::all();
        return view('backend.Size.sizeList', compact('size'));
    }



    public function delete($id){
        $data = Size::findorfail($id)->delete();
        if($data){
            $notification = array(
                'message' => 'Size Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);;
    }





    public function edit($id){
        $size = Size::findorfail($id);
        return view('backend.Size.sizeEdit', compact('size'));
    }



    public function update(SizeRequest $request,$id){
        $data = Size::find($id);
        $data->sizes_name = $request->size;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Size Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('size.list')->with($notification);
    }
}
