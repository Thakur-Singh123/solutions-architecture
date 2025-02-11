<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Function for add category
    public function create_category(Request $request) {
        //Create category
        $is_create_category = Category::create([
            'name' => $request->name,
            'date' => $request->date,
            'status' => $request->status,
        ]);
        //Check if category created or not
        if ($is_create_category) {
            $message['status'] = 200;
            $message['message'] = "Category created successfully.";
            $message['data'] = $is_create_category;
            return response()->json($message, 200);
        } else {
            $message['status'] = 401;
            $message['message'] = "Oops something wrong.";
            $message['data'] = [];
            return response()->json($message, 401);
        }   
    }
}
