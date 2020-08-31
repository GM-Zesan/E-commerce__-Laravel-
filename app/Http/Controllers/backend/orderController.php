<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\frontendModel\Shipping;
use App\frontendModel\Payment;
use App\frontendModel\Order;
use App\frontendModel\OrderDetail;

class orderController extends Controller
{
    public function pendingOrder(){
        $data['pendingorders'] = Order::where('status','0')->get();
        return view('backend\Order\pendingOrder',$data);
    }
    public function approvedOrder(){
        $data['approvedorders'] = Order::where('status','1')->get();
        return view('backend\Order\approvedOrder',$data);
    }

    public function detailsOrder($id){
        $data['order'] = Order::find($id);
        return view('backend\Order\detailsOrder',$data);
    }

    public function appOrder(Request $request){
        $order = Order::find($request->id);
        $order->status = '1';
        $order->save();
    }
}
