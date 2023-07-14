<?php

namespace App\Http\Controllers\Front;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

     public function detail($id)
     {

        $tag_data = Tag::where('post_id',$id)->get();

       // $post_detail = Post::where('id',$id)->first();
        $post_detail = Post::with('rSubCategory')->where('id',$id)->first();
        if($post_detail->author_id == 0)
        {
            $user_data = Admin::where('id',$post_detail->admin_id)->first();
           // dd($user_data->name);
        }
        else{

            //implement this later
        }
        //update page view count
        //dd($post_detail->visitors);
        $new_value = $post_detail->visitors+1;
        $post_detail->visitors = $new_value;
        $post_detail->update();

        return view('front.post_detail', compact('post_detail','user_data','tag_data'));

     }

}
