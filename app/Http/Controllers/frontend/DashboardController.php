<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\frontendModel\Shipping;
use App\frontendModel\Payment;
use App\frontendModel\Order;
use App\frontendModel\OrderDetail;
use App\bacckendModel\Product;


use App\User;
use Cart;
use DB;
use Auth;
use Session;
use Mail;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['user'] = Auth::user();
        return view('customerDashboard',$data);
    }


    public function editProfile(){
        $data['editData'] = Auth::user();
        return view('editProfile',$data);
    }

    public function updateProfile(Request $request){
        $user = User::find(Auth::user()->id);
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required | unique:users,email,'.$user->id,
            'mobile' => ['required','unique:users,mobile,'.$user->id,
                        'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
            'address' => 'required',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/user/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path,$image_full_name);
            $user->image = $image_url;
            if(!empty($request->old_image)){
                unlink($request->old_image);
            }
            $pro = $user->save();
            if($pro){
                $notification = array(
                    'message' => 'Profile Updated Successfully',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('dashboard')->with($notification);
        }else{
            $user['image'] = $request->old_image;
            $pro = $user->save();
            if($pro){
                $notification = array(
                    'message' => 'Profile Updated With Old Image',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('dashboard')->with($notification);
        }
    }

    public function passwordChange(){
        return view('passwordChange');
    }

    public function passwordUpdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->currentpassword])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->newpassword);
            $user->save();
            $notification = array(
                'message' => 'Password changed successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('dashboard')->with($notification);
        }else{
            $notification = array(
                'message' => 'Sorry! Your current password does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function cartUpdate(Request $request){
        $cartUpdate = Cart::update($request->rowId, $request->qty);
        if($cartUpdate){
            $notification = array(
                'message' => 'Quantity Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('customer.payment')->with($notification);
    }


    public function payment(){
        return view('customerPayment');
    }


    public function paymentStore(Request $request){
        if($request->product_id == NULL){
            $notification = array(
                'message' => 'Your cart is empty, Please select any product',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $this->validate($request,[
                'payment_method' => 'required',
            ]);
            if($request->payment_method == 'Bkash' && $request->transaction_no == NULL){
                $notification = array(
                    'message' => 'Please enter bkash Transaction no.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            DB::transaction(function() use($request){
                $payment = new Payment();
                $payment->payment_method = $request->payment_method;
                $payment->transaction_no = $request->transaction_no;
                $payment->save();
    
                $order = new Order();
                $order->user_id = Auth::user()->id;
                $order->shipping_id = Session::get('shipping_id');
                $order->payment_id = $payment->id;
                $order_data = Order::orderby('id','desc')->first();
    
                if($order_data == null){
                    $firstreg = '0';
                    $order_no = $firstreg+1;
                }else{
                    $order_data = Order::orderby('id','desc')->first()->order_no;
                    $order_no = $order_data+1;
                }
                
                $order->order_no = $order_no;
                $order->total_price = $request->total_price;
                $order->status = '0';
                $order->save();
    
                $order_details = new OrderDetail();
                $contents = Cart::content();
                foreach($contents as $content){
                    $order_details = new OrderDetail();
                    $order_details->order_id = $order->id;
                    $order_details->product_id = $content->id;
                    $order_details->color_id = $content->options->color_id;
                    $order_details->size_id = $content->options->size_id;
                    $order_details->quantity = $content->qty;
                    $order_details->save();
                }
            });
        }
        Cart::destroy();
        $notification = array(
            'message' => 'Your Product Order Send Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('order.list')->with($notification);
    }

    public function orderList(){
        $data['user'] = Auth::user();
        $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
        return view('orderList',$data);
    }

    public function orderDetails($id){
        $orderdata = Order::find($id);
        $data['order'] = Order::where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
        if($data['order'] == false){
            $notification = array(
                'message' => 'Do not try to be over-smart!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $data['user'] = Auth::user();
            $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
            return view('orderDetails',$data);
        }

    }

    public function orderPrint($id){
        $orderdata = Order::find($id);
        $data['order'] = Order::where('id',$orderdata->id)->where('user_id',Auth::user()->id)->first();
        if($data['order'] == false){
            $notification = array(
                'message' => 'Do not try to be over-smart!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $data['user'] = Auth::user();
            $data['orders'] = Order::where('user_id',Auth::user()->id)->get();
            return view('orderPrint',$data);
        }

    }
}
