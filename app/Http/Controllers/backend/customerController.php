<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class customerController extends Controller
{
    public function list(){
        $data = User::where('usertype','customer')->where('status','1')->get();
        return view('backend\Customer\customerList',compact('data'));
    }

    public function draft(){
        $data = User::where('usertype','customer')->where('status','0')->get();
        return view('backend\Customer\customerDraft',compact('data'));
    }

    public function delete($id){
        $image = User::find($id)->image;
        if(!empty($image)){
            unlink($image);
        }
        $delete = User::find($id)->delete();
        if($delete){
            $notification = array(
                'message' => 'Customer Info Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }


}
