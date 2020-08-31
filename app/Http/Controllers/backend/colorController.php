<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Color;
use App\Http\Requests\ColorRequest;

class colorController extends Controller
{
    public function add(){
        return view('backend.Color.colorAdd');
    }


    public function store(Request $request){
        $this->validate($request,[
            'color' => 'required|unique:colors,colors_name'
        ]);
        $data = new Color;
        $data->colors_name = $request->color;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Color Inserted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('color.list')->with($notification);
    }



    public function list(){
        $color = Color::all();
        return view('backend.Color.colorList', compact('color'));
    }



    public function delete($id){
        $data = Color::findorfail($id)->delete();
        if($data){
            $notification = array(
                'message' => 'Color Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);;
    }





    public function edit($id){
        $color = Color::findorfail($id);
        return view('backend.Color.colorEdit', compact('color'));
    }



    public function update(ColorRequest $request,$id){
        $data = Color::find($id);
        $data->colors_name = $request->color;
        $data->save();
        if($data->save()){
            $notification = array(
                'message' => 'Color Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('color.list')->with($notification);
    }
}
