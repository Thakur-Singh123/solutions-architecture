<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Models\CategoryBlogRelation;


class CategoryController extends Controller
{
    //Function for add category
    public function add_category() {
        return view('admin.categories.add-new-category');
    }

    //Function for submit category
    public function submit_category(Request $request) {
        //Create category
        $is_create_category = Category::create([
            'name' => $request->name,
            'date' => $request->date,
            'status' => 'Active',
        ]);
        //Check if category created or not
        if ($is_create_category) {
            return back()->with('success', 'Category created successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for all catagories
    public function all_categories() {
        //Get categories detail
        $all_categories = Category::with('blog_details')->Orderby('ID', 'DESC')->get();
        //echo "<pre>"; print_r($all_categories->toArray());exit;
        return view('admin.categories.all-categories-list', compact('all_categories'));
    }

    //Function for edit category
    public function edit_category($id) {
        //Get category detail
        $category_detail = Category::find($id);
        return view('admin.categories.edit-category', compact('category_detail'));
    }

    //Function for update category
    public function update_category(Request $request, $id) {
        //Update category
        $is_update_category = Category::where('id', $id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'status' => 'Active',
        ]);
        //Check if category updated or not
        if ($is_update_category) {
            return back()->with('success', 'Category updated successfully.');
        } else {
            return back()->with('unsuccess', 'Opps something went wrong!');
        }
    }

    //Function for delete category
    public function delete_category(Request $request) {
        //Get ajax request
        $category_id = $request->category_id;
        //Delete category
        $is_delete_category = Category::where('id', $category_id)->delete();
        //Check if category deleted or not
        if ($is_delete_category) {
            CategoryBlogRelation::where('category_id', $category_id)->delete();
            echo '<p style color="green;">Category deleted successfully.>';
            echo '<script> setTimeout(function () { window.location.reload(); }, 3000);</script>';
        } else {
            echo '<p style color="red;">Opps something went wrong!</p>';
        }        
    }
}
