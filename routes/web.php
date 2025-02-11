<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Admin Only
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'Admin'], function () {
        //Admin dashboard
        Route::get('admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard']);
        //Categories
        Route::get('admin/add-new-category', [App\Http\Controllers\Admin\CategoryController::class, 'add_category']);
        Route::post('admin/submit-category', [App\Http\Controllers\Admin\CategoryController::class, 'submit_category'])->name('admin.submit.category');
        Route::get('admin/all-categories-list', [App\Http\Controllers\Admin\CategoryController::class, 'all_categories']);
        Route::get('admin/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit_category']);
        Route::post('admin/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update_category'])->name('admin.update.category');
        Route::get('admin/delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'delete_category']);
        //Articles
        Route::get('admin/add-new-article', [App\Http\Controllers\Admin\BlogController::class, 'add_blog']);
        Route::post('admin/submit-article', [App\Http\Controllers\Admin\BlogController::class, 'submit_blog'])->name('admin.submit.article');
        Route::get('admin/all-articles-list', [App\Http\Controllers\Admin\BlogController::class, 'all_blogs']); 
        Route::get('admin/edit-article/{id}', [App\Http\Controllers\Admin\BlogController::class, 'edit_blog']);
        Route::post('admin/update-article/{id}', [App\Http\Controllers\Admin\BlogController::class, 'update_blog'])->name('admin.update.article');
        Route::get('admin/delete-article', [App\Http\Controllers\Admin\BlogController::class, 'delete_blog']);
        Route::get('admin/single-article-detail/{slug}', [App\Http\Controllers\Admin\BlogController::class, 'single_blog']);
        //Profiles
        Route::get('admin/edit-profile', [App\Http\Controllers\Admin\ProfileController::class, 'edit_profile']);
        Route::post('admin/update-profile/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update_profile'])->name('admin.update.profile');
        Route::get('admin/change-password', [App\Http\Controllers\Admin\ProfileController::class, 'change_password']);
        Route::post('admin/submit-change-password', [App\Http\Controllers\Admin\ProfileController::class, 'submit_change_password'])->name('admin.submit.change.password');
        //Contacts
        Route::get('admin/all-contacts', [App\Http\Controllers\Admin\ContactFormController::class, 'all_contacts']);
        Route::get('admin/delete-contact', [App\Http\Controllers\Admin\ContactFormController::class, 'delete_contact']);
    });

    //Customer Only
    Route::group(['middleware' => 'Customer'], function () {
        //Customer dashboard
        Route::get('customer/dashboard', [App\Http\Controllers\Customer\DashboardController::class, 'dashboard']);
    });
});


//Disable Registration
Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
