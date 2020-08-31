<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\backendModel\Product;
use App\backendModel\Brand;
use App\backendModel\Size;
use App\backendModel\Color;

use App\backendModel\ProductSubImage;
use App\backendModel\ProductSize;
use App\backendModel\ProductColor;

use App\frontendModel\Shipping;
use App\frontendModel\Payment;
use App\frontendModel\Order;
use App\frontendModel\OrderDetail;

use App\User;
use Cart;
use DB;
use Auth;
use Session;
use Mail;


class CheckOutController extends Controller
{
    public function UserLogin(){
        return view('userLogin');
    }


    public function UserSignup(){
        return view('userSignup');
    }


    public function SignupStore(Request $request){
        DB::transaction(function() use($request){
            $this->validate($request,[
                'username' => 'required',
                'email' => 'required | unique:users,email',
                'mobile' => ['required','unique:users,mobile',
                            'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
                'password' => 'min:8|required_with:password_confirmation| 
                            same:password_confirmation',
                'password_confirmation' => 'min:8',
            ]);

            $code = rand(0000,9999);

            $user = new User();
            $user->name = $request->username;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->status = '0';
            $user->usertype = 'customer';
            $user->save();

            $data = array(
                'email' => $request->email,
                'code' =>$code
            );

            Mail::send('emails.verify_email', $data, function($message) use($data){
                $message->from('gmzesan7767@gmail.com','G.M. Zesan');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });
        });
        $notification = array(
            'message' => 'You have sign up successfully, Please verify your email',
            'alert-type' => 'success'
        );
        return redirect()->route('email.verify')->with($notification);
    }

    public function EmailVerify(){
        return view('emailVerify');
    }



    public function VerifyStore(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required'
        ]);

        $checkdata = User::where('email',$request->email)->where('code',$request->code)->first();
        
        if($checkdata){
            $checkdata->status = '1';
            $checkdata->save();
            $notification = array(
                'message' => 'You have successfully verified, please login',
                'alert-type' => 'success'
            );
            return redirect()->route('user.login')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Sorry! Email or verification code does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }




    public function checkOut(){
       return view('customerCheckout'); 
    }
    

    public function checkoutStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'mobile' => ['required',
                        'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
            'address' => 'required',
        ]);
        $checkout = new Shipping();
        $checkout->user_id = Auth::user()->id;
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile = $request->mobile;
        $checkout->address = $request->address;
        $checkout->save();
        Session::put('shipping_id',$checkout->id);
        $notification = array(
            'message' => 'Information saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.payment')->with($notification);
    }






}
