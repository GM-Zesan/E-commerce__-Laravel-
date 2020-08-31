<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Slider;
use App\Http\Requests\SliderRequest;

class sliderController extends Controller
{
    public function add(){
        return view('backend.Slider.sliderAdd');
    }



    public function store(Request $request){
        $this->validate($request,[
            'ftitle' => 'required|unique:sliders,sliders_first_title|max:50',
            'stitle' => 'max:25'
        ]);
        $data = new Slider;
        $data->sliders_first_title = $request->ftitle;
        $data->sliders_second_title = $request->stitle;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/slider/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path,$image_full_name);
            $data->sliders_image = $image_url;
            $slider = $data->save();
            if($slider){
                $notification = array(
                    'message' => 'Slider Inserted Successfully',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('slider.list')->with($notification);
        }else{
            $slider = $data->save();
            if($slider){
                $notification = array(
                    'message' => 'Slider Inserted Without Image',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('slider.list')->with($notification);
        }
    }




    public function list(){
        $slider = Slider::all();
        return view('backend.Slider.sliderList', compact('slider'));
    }




    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.Slider.sliderEdit', compact('slider'));
    }



    public function update(SliderRequest $request,$id){
        $this->validate($request,[
            'stitle' => 'max:25'
        ]);
        $data = Slider::find($id);
        $data->sliders_first_title = $request->ftitle;
        $data->sliders_second_title = $request->stitle;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/backend/slider/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path,$image_full_name);
            $data->sliders_image = $image_url;
            if(!empty($request->old_image)){
                unlink($request->old_image);
            }
            $slider = $data->save();
            if($slider){
                $notification = array(
                    'message' => 'Slider Updated Successfully',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('slider.list')->with($notification);
        }else{
            $data['sliders_image'] = $request->old_image;
            $slider = $data->save();
            if($slider){
                $notification = array(
                    'message' => 'Slider Updated With Old Image',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('slider.list')->with($notification);
        }
    }





    public function delete($id){
        $slider = Slider::find($id);
        $image = $slider->sliders_image;
        $delete = Slider::find($id)->delete();
        if($delete){
            unlink($image);
            $notification = array(
                'message' => 'Slider Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }
}
