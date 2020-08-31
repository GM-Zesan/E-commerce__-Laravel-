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

use App\User;
use Cart;
use Auth;
use Session;
use DB;

class cartController extends Controller
{
    public function AddToCart(Request $request){
        $this->validate($request,[
            'size_id' => 'required',
            'color_id' => 'required'
        ]);
        $product = Product::where('id',$request->id)->first();
        $product_size = Size::where('id', $request->size_id)->first();
        $product_color = Color::where('id', $request->color_id)->first();
        Cart::add([
            'id' => $product->id,
            'qty' => $request->qty,
            'price' => $product->products_price,
            'name' => $product->products_name,
            'weight' =>550,
            'options' =>[
                'size_id' => $request->size_id,
                'size_name' => $product_size->sizes_name,
                'color_id' => $request->color_id,
                'color_name' => $product_color->colors_name,
                'image' => $product->products_image
            ],
        ]);
        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('cart')->with($notification);
    }



    public function Cart(Request $request){
        return view('cart');
    }

    public function UpdateCart(Request $request){
        $cartUpdate = Cart::update($request->rowId, $request->qty);
        if($cartUpdate){
            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->route('cart')->with($notification);
    }

    public function DeleteCart($rowId){
        $remove = Cart::remove($rowId);
            $notification = array(
                'message' => 'Product Removed Successfully',
                'alert-type' => 'success'
            );
        if(@Auth::user()->id != NULL && Session::get('shipping_id') == NULL){
            return redirect()->route('cart')->with($notification);
        }elseif(@Auth::user()->id != NULL && Session::get('shipping_id') != NULL){
            return redirect()->route('customer.payment')->with($notification);
        }

        // return redirect()->route('cart')->with($notification);
    }
}
