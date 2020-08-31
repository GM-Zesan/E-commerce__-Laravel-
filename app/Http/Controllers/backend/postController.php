<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\backendModel\Post;
use App\backendModel\Category;

use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
class postController extends Controller{


    public function add(){
        $cat = Category::all();
        return view('backend.Post.postAdd', compact('cat'));
    }



    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required|unique:posts,posts_title|max:100',
            'details' => 'required'
        ]);
        $data = new Post;
        $data->posts_title = $request->title;
        $data->slug = str::slug($request->title);
        $data->categoriesId = $request->category;
        $data->posts_details = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path,$image_full_name);
            $data->image = $image_url;
            $post = $data->save();
            if($post){
                $notification = array(
                    'message' => 'Post Inserted Successfully',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('post.list')->with($notification);
        }else{
            $post = $data->save();
            if($post){
                $notification = array(
                    'message' => 'Post Inserted Without Image',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('post.list')->with($notification);
        }
    }




    public function list(){
        $post = Post::all();
        return view('backend.Post.postList', compact('post'));
    }




    public function view($id){
        $post = Post::find($id);
        return view('backend.Post.postView', compact('post'));
    }




    public function edit($id){
        $cat = Category::all();
        $post = Post::find($id);
        return view('backend.Post.postEdit', compact('cat','post'));
    }



    public function update(Request $request,$id){
        $this->validate($request,[
            'title' => 'required|unique:posts,posts_title|max:100',
            'image' => 'mimes:jpeg,jpg,png| max:8000',
            'details' => 'required'
        ]);
        $data = Post::find($id);
        $data->posts_title = $request->title;
        $data->slug = str::slug($request->title);
        $data->categoriesId = $request->category;
        $data->posts_details = $request->details;
        $image = $request->file('image');
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/image/';
            $image_url = $upload_path.$image_full_name;
            $image->move($upload_path,$image_full_name);
            $data->image = $image_url;
            if(!empty($request->old_image)){
                unlink($request->old_image);
            }
            $post = $data->save();
            if($post){
                $notification = array(
                    'message' => 'Post Updated Successfully',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('post.list')->with($notification);
        }else{
            $data['image'] = $request->old_image;
            $post = $data->save();
            if($post){
                $notification = array(
                    'message' => 'Post Updated With Old Image',
                    'alert-type' => 'success'
                );
            }
            return redirect()->route('post.list')->with($notification);
        }
    }





    public function delete($id){
        $post = Post::find($id);
        $image = $post->image;
        $delete = Post::find($id)->delete();
        if($delete){
            unlink($image);
            $notification = array(
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        return redirect()->back()->with($notification);
    }


}
