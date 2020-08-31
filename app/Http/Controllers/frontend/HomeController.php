<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Slider;
use App\backendModel\Product;
use App\backendModel\Brand;

use App\backendModel\ProductSubImage;
use App\backendModel\ProductSize;
use App\backendModel\ProductColor;
use Cart;
use DB;
class HomeController extends Controller
{
    public function index(){
        $data['slider'] = Slider::all();
        $data['categories'] = Product::select('categories_id')->groupBy('categories_id')->get();
        $data['brands'] = Product::select('brands_id')->groupBy('brands_id')->get();
        $data['products'] = Product::orderBy('id', 'desc')->paginate(8);
        return view('ui', $data);
    }

    public function productList(){
        $data['categories'] = Product::select('categories_id')->groupBy('categories_id')->get();
        $data['brands'] = Product::select('brands_id')->groupBy('brands_id')->get();
        $data['products'] = Product::orderBy('id', 'desc')->paginate(20);
        return view('product', $data);
    }

    public function quickView($slug){
        $data['product'] = Product::where('slug', $slug)->first();
        $data['product_sub_images'] = ProductSubImage::where('products_id',$data    ['product']->id)->get();
        $data['product_color'] = ProductColor::where('products_id',$data['product'] ->id) ->get();
        $data['product_size'] = ProductSize::where('products_id',$data['product']->id)->get();
        return view('productDetails', $data);
    }

    
    public function productFind(Request $request){
        $slug = $request->slug;
        $data['product'] = Product::where('slug', $slug)->first();
        if($data['product']){
            $data['product'] = Product::where('slug', $slug)->first();
            $data['product_sub_images'] = ProductSubImage::where('products_id',$data['product']->id)->get();
            $data['product_color'] = ProductColor::where('products_id',$data['product']->id)->get();
            $data['product_size'] = ProductSize::where('products_id',$data['product']->id)->get();
            return view('productFind', $data);
        }else{
            $notification = array(
                'message' => 'Product does not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function productGet(Request $request){
        $slug = $request->slug;
        $productdata = DB::table('products')->where('slug','LIKE','%'.$slug.'%')->get();
        $html = '';
        $html .= '<div><ul>';
        if($productdata){
            foreach($productdata as $v){
                $html .= '<li class="pointer">'.$v->slug.'</li>';
            }
        }
        $html .= '</div></ul>';
        return response()->json($html);
    }
}
