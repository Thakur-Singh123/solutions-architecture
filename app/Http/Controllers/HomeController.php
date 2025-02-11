<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
       //Get user detail
       $user_detail = Auth::user();
       //Check if user type admin or not
       if ($user_detail->user_type == 'Admin') {
           return redirect('admin/all-articles-list');
        //Check if user type customer or not
        } elseif ($user_detail->user_type == 'Customer') {
           return redirect('customer/dashboard');
        } else {
          return view('home');
        }
    }
}
