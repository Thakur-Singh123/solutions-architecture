<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Blog;
use App\Models\CategoryBlogRelation;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Blog Details
Route::get('all-articles-list', [App\Http\Controllers\Api\BlogController::class, 'get_all_blogs']);
Route::get('article/{slug}', [App\Http\Controllers\Api\BlogController::class, 'single_blog_detail']);
//Contacts
Route::post('contact-form', [App\Http\Controllers\Api\ContactFormController::class,'submit_contact_form']);
