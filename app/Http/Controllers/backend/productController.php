<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Category;
use App\backendModel\Brand;
use App\backendModel\Color;
use App\backendModel\Size;
use App\backendModel\Product;
use App\backendModel\ProductColor;
use App\backendModel\ProductSize;
use App\backendModel\ProductSubImage;
use Illuminate\Support\Str;
use DB;

use App\Http\Requests\ProductRequest;

class productController extends Controller
{
    public function add(){
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        return view('backend.Product.productAdd',$data);
    }


    public function store(Request $request){
        DB::transaction(function() use($request){
            $this->validate($request,[
                'product_name' => 'required|unique:products,products_name|max:25',
                'size' => 'required',
                'color' => 'required',
                'ldesc' => 'required'
            ]);
            $product = new Product;
            $product->categories_id = $request->category;
            $product->brands_id = $request->brand;
            $product->products_name = $request->product_name;
            $product->slug = str::slug($request->product_name);
            $product->products_price = $request->product_price;
            $product->products_short_desc =$request->sdesc;
            $product->products_long_desc =$request->ldesc;
            $img = $request->file('product_image');
            if($img){
                $image_name = hexdec(uniqid());
                $ext = strtolower($img->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/backend/image/';
                $image_url = $upload_path.$image_full_name;
                $img->move($upload_path,$image_full_name);
                $product->products_image = $image_url;
                $product->save();
            }
            else{
                $product->save();
            }
            if($product->save()){
                $files = $request->sub_image;
                if(!empty($files)){
                    foreach ($files as $file) {
                        $image_name = hexdec(uniqid());
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name.'.'.$ext;
                        $upload_path = 'public/backend/subimage/';
                        $image_url = $upload_path.$image_full_name;
                        $file->move($upload_path,$image_full_name);
                        $subimage['sub_image'] = $image_url;

                        $subimage = new ProductSubImage;
                        $subimage->products_id = $product->id;
                        $subimage->sub_image = $image_url;
                        $subimage->save();
                    }
                }


                // ProductColor data inserted
                $colors = $request->color;
                if(!empty($colors)){
                    foreach ($colors as $color) {
                        $mycolor = new ProductColor;
                        $mycolor->products_id = $product->id;
                        $mycolor->colors_id = $color;
                        $mycolor->save();
                    }
                }


                // ProductSize data inserted
                $sizes = $request->size;
                if(!empty($sizes)){
                    foreach ($sizes as $size) {
                        $mysize = new Productsize;
                        $mysize->products_id = $product->id;
                        $mysize->sizes_id = $size;
                        $mysize->save();
                    }
                }
            }
        });
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }



    public function list(){
        $products = Product::all();
        return view('backend.Product.productList', compact('products'));
    }




    public function view($id){
        $product = Product::find($id);
        return view('backend\Product\productView', compact('product'));
    }




    public function edit($id){
        $data['products'] = Product::findorfail($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();

        $data['color_array'] = ProductColor::select('colors_id')->where('products_id', $data['products']->id)->orderBy('id','asc')->get()->toArray();

        $data['size_array'] = ProductSize::select('sizes_id')->where('products_id', $data['products']->id)->orderBy('id','asc')->get()->toArray();
        return view('backend.Product.productEdit',$data);
    }





    public function update(ProductRequest $request,$id){
        DB::transaction(function() use($request, $id){
            $this->validate($request,[
                'size' => 'required',
                'color' => 'required',
                'ldesc' => 'required'
            ]);
            $product = Product::find($id);
            $product->categories_id = $request->category;
            $product->brands_id = $request->brand;
            $product->products_name = $request->product_name;
            $product->slug = str::slug($request->product_name);
            $product->products_price = $request->product_price;
            $product->products_short_desc =$request->sdesc;
            $product->products_long_desc =$request->ldesc;
            $img = $request->file('product_image');
            if(!empty($img)){
                $image_name = hexdec(uniqid());
                $ext = strtolower($img->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/backend/image/';
                $image_url = $upload_path.$image_full_name;
                $img->move($upload_path,$image_full_name);
                $product->products_image = $image_url;
                if(!empty($request->old_image)){
                    unlink($request->old_image);
                }
                $product->save();
            }else{
                $product['products_image'] = $request->old_image;
                $product->save();
            }


            if($product->save()){

                // ProductSubImages Unlink
                $files = $request->sub_image;
                if(!empty($files)){
                    $subImages = ProductSubImage::where('products_id',$id)->get()->toArray();
                    foreach ($subImages as $value) {
                        if(!empty($value)){
                            unlink($value['sub_image']);
                        }
                    }
                    ProductSubImage::where('products_id',$id)->delete();
                }


                // ProductSubImages data updated
                if(!empty($files)){
                    foreach ($files as $file) {
                        $image_name = hexdec(uniqid());
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name.'.'.$ext;
                        $upload_path = 'public/backend/subimage/';
                        $image_url = $upload_path.$image_full_name;
                        $file->move($upload_path,$image_full_name);
                        $subimage['sub_image'] = $image_url;

                        $subimage = new ProductSubImage;
                        $subimage->products_id = $product->id;
                        $subimage->sub_image = $image_url;
                        $subimage->save();
                    }
                }


                // ProductColor data updated
                $colors = $request->color;
                if(!empty($colors)){
                    ProductColor::where('products_id',$id)->delete();
                }
                if(!empty($colors)){
                    foreach ($colors as $color) {
                        $mycolor = new ProductColor;
                        $mycolor->products_id = $product->id;
                        $mycolor->colors_id = $color;
                        $mycolor->save();
                    }
                }


                // ProductSize data Updated
                $sizes = $request->size;
                if(!empty($sizes)){
                    ProductSize::where('products_id',$id)->delete();
                }
                if(!empty($sizes)){
                    foreach ($sizes as $size) {
                        $mysize = new Productsize;
                        $mysize->products_id = $product->id;
                        $mysize->sizes_id = $size;
                        $mysize->save();
                    }
                }
            }
        });
        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }





    public function delete($id){
        $product = Product::find($id);
        $productImage = $product->products_image;
        if(!empty($productImage)){
            unlink($productImage);
        }


        $subImages = ProductSubImage::where('products_id',$id)->get()->toArray();
        if(!empty($subImages)){
            foreach ($subImages as $value) {
                if(!empty($value)){
                    unlink($value['sub_image']);
                }
            }
        }

        
        ProductSubImage::where('products_id',$id)->delete();
        ProductColor::where('products_id',$id)->delete();
        ProductSize::where('products_id',$id)->delete();
        $delete = Product::find($id)->delete();
        if($delete){
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }

}
