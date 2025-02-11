<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\CategoryBlogRelation;

class BlogController extends Controller
{
    //Function for all blogs
    public function get_all_blogs() {
        $all_blogs = Blog::with('category_details')->Orderby('ID', 'DESC')->get();
        //Append full image URL
        foreach ($all_blogs as $blog) {
            if ($blog->image) {
                $blog->image_url = asset('public/uploads/blogs/' . $blog->image);
            } else {
                $blog->image_url = asset('public/uploads/default.png');
            }
        }
        //Check if blogs gets or not
        if ($all_blogs) {
            $message['status'] = 200;
            $message['message'] = "Articles detail get successfully.";
            $message['data'] = $all_blogs;
            return response()->json($message, 200);
        } else {
            $message['status'] = 401;
            $message['message'] = "Oops something wrong.";
            $message['data'] = [];
            return response()->json($message, 401);
        }   
    }

    //Function for single blog detail 
    public function single_blog_detail($slug) {
        $single_blog = Blog::where('slug', $slug)->with('category_details')->first();
        //Append full image URL
        if ($single_blog->image) {
            $single_blog->image_url = asset('public/uploads/blogs/' . $single_blog->image);
        } else {
            $single_blog->image_url = asset('public/uploads/default.png'); 
        }
        //Check if blog gets or not
        if ($single_blog) {
            $message['status'] = 200;
            $message['message'] = "Single article get successfully.";
            $message['data'] = $single_blog;
            return response()->json($message, 200);
        } else {
            $message['status'] = 401;
            $message['message'] = "Oops something wrong.";
            $message['data'] = [];
            return response()->json($message, 401);
        }   
    }
}
