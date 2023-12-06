<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //Home page kholne function
    public function home()
    {
        $categories = Category::all();
        $featuredProduct = Product::orderBy('id', 'desc')->limit(4)->get();
        $recentProduct = Product::orderBy('id', 'desc')->where('category_id', 1)->limit(4)->get();
        $images = Image::all();
        return view('welcome', compact('images', 'featuredProduct', 'recentProduct','categories'));
    }

    //About page kholne function
    public function checkout()
    {
        return view('frontend.checkout');
    }


    public function detail($id)
    {
        // $product = Product::find($id);
        // return view('frontend.detail',compact('product'));
    }

    //contact page kholne function
    public function contact()
    {
        return view('frontend.contact');
    }

    public function product_detail($id)
    {

        $product = Product::find($id);
        $categories = Category::all();
        return view('frontend.product_detail', compact('product', 'categories'));
    }

    public function cart(Request $request)
    {
        return view('frontend.cart');
    }

    public function shop()
    {
        $product = Product::all();
        return view('frontend.shop', compact('product'));
    }

    public function cartDelete($id)
    {
    }

    public function edit()
    {
        return view('frontend.edit');
    }
}
