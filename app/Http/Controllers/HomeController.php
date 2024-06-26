<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\image;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {

        $role = Auth::user()->role;
        if($role == 'admin'){
            return view('backend.home');
        }elseif($role == 'customer'){
            return view("frontend.dashboard");
        }else{
            return view("/");
        }
    }

    public function dashboard()
    {
        $categories = Category::all();
        return view('frontend.dashboard', compact('categories'));
    }


}
