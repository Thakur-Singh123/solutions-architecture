<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\CategoryBlogRelation;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //Function for add blog
    public function add_blog() {
        //Get categories
        $all_categories = Category::Orderby('ID', 'DESC')->get();
        return view('admin.blogs.add-new-blog', compact('all_categories'));
    }

    //Function for submit blog
    public function submit_blog(Request $request) {
        //Check if image is exists or not
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/blogs'), $filename);
        }

        //Create slug accor title
        $slug = \Str::slug($request->input('title'), "-");
        //Check if the slug already exists or not
        if (Blog::where('slug', $slug)->exists()) {
            return back()->with('unsuccess', 'The slug already exists. Please use a different title.');
        }

        //Create blog
        $is_create_blog = Blog::create([
            'slug' => $slug,
            'title' => $request->title,
            'desc' => $request->desc,
            'date' => $request->date,
            'status' => 'Active',
            'image' => $filename,
        ]);

        //Check if blog created or not
        if ($is_create_blog) {
            //Check if category assign or not
            if (isset($request->category_name)) {
                //Get last insert blog id
                $last_insert_id = $is_create_blog->id;
                //Create blog cate relation
                foreach ($request->category_name as $category_id) {
                    CategoryBlogRelation::create([
                        'blog_id' => $last_insert_id,
                        'category_id' => $category_id,
                    ]);
                }
            }
            return back()->with('success', 'Article created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for all blogs
    public function all_blogs() {
        $all_blogs = Blog::with('category_details')->Orderby('ID', 'DESC')->get();
        return view('admin.blogs.all-blogs-list', compact('all_blogs'));
    }

    //Function for edit blog
    public function edit_blog($id) {
        //Get categories
        $all_categories = Category::Orderby('ID', 'DESC')->get();
        //Get edit blog
        $blog_detail = Blog::with('category_details')->find($id);
        return view('admin.blogs.edit-blog', compact('all_categories','blog_detail'));
    }

    //Function for update blog
    public function update_blog(Request $request, $id) {
        //Check if image is exists or not
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('uploads/blogs'), $filename);
            //Update slug
            $slug = \Str::slug($request->input('title'), "-");
            //Update blog
            $is_update_blog = Blog::where('id', $id)->update([
                'slug' => $slug,
                'title' => $request->title,
                'desc' => $request->desc,
                'date' => $request->date,
                'status' => 'Active',
                'image' => $filename,
            ]);
            //Check if blog updated or not
            if ($is_update_blog) {
                //Check if category assign or not
                if (isset($request->category_name)) {
                    //Delete old blog cat relation
                    CategoryBlogRelation::where('blog_id', $id)->delete();
                    //Create or update blog
                    foreach ($request->category_name as $category_id) {
                        //Update category id
                        CategoryBlogRelation::create([
                            'blog_id' => $id,
                            'category_id' => $category_id,
                        ]);
                    }
                }
                return back()->with('success', 'Article updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        } else {
            //Update slug
            $slug = \Str::slug($request->input('title'), "-");
            //Update blog
            $is_update_blog = Blog::where('id', $id)->update([
                'slug' => $slug,
                'title' => $request->title,
                'desc' => $request->desc,
                'date' => $request->date,
                'status' => 'Active',
            ]);
            //Check if blog updated or not
            if ($is_update_blog) {
                //Check if category assign or not
                if (isset($request->category_name)) {
                    //Delete old blog cat relation
                    CategoryBlogRelation::where('blog_id', $id)->delete();
                    //Create or update blog
                    foreach ($request->category_name as $category_id) {
                        //Update category id
                        CategoryBlogRelation::create([
                            'blog_id' => $id,
                            'category_id' => $category_id,
                        ]);
                    }
                }
                return back()->with('success', 'Article updated successfully.');
            } else {
                return back()->with('unsuccess', 'Opps something went wrong!');
            }
        }
    }

    //Function for delete blog
    public function delete_blog(Request $request) {
        //Get ajax request
        $blog_id = $request->blog_id;
        //Delete blog
        $is_delete_blog = blog::where('id', $blog_id)->delete();
        //Check if blog deleted or not
        if ($is_delete_blog) {
            CategoryBlogRelation::where('blog_id', $blog_id)->delete();
            echo '<p style="color:green;">Article deleted successfully.</p>';
            echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
        } else {
            echo '<p style="color:red;">Opps something went wrong!</p>';
        }
    }

    //Function for single blog detail
    public function single_blog($slug) {
        $single_blog = Blog::where('slug', $slug)->with('category_details')->get();
        //Check if blog exists or not
        if (!$single_blog) {
            return redirect()->back()->with('unsuccess', 'Blog not found.');
        }
        return view('admin.blogs.single-blog-detail', compact('single_blog'));
    } 
}
