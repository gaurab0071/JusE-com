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
        // $totalCartItem = Cart::Where('user_id',Auth::user()->id)->count();
        $images = Image::all();
        return view('welcome', compact('images', 'featuredProduct', 'recentProduct','categories'));
    }

    //Checkout page
    public function checkout()
{
    // Check if user is authenticated
    if (!Auth::check()) {
        // If not authenticated, you can redirect the user or show an error message
        return redirect()->route('login')->with('error', 'You need to login first to proceed with checkout.');
    }

    $categories = Category::all();
    
    // Assuming there's a 'user_id' column in the 'carts' table
    $cartItems = Cart::where('user_id', Auth::user()->id)->get();

    $subtotal = $cartItems->sum('amount');
    
    $shippingCharge = 150;
    
    $total = $subtotal + $shippingCharge;

    return view('frontend.checkout', compact('categories', 'cartItems', 'subtotal', 'shippingCharge', 'total'));
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
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty;
        $cart->selling_price = $request->selling_price;
        $cart->amount = $request->qty * $request->selling_price;
        $cart->user_id = Auth::user()->id;
        $cart->save();
        toast("Item added to cart successfully", 'success');
        return redirect()->back();
        
    }

    public function cartItems()
{
    $categories = Category::all();
    $cartItems = [];
    $totalCartItem = 0;
    $subtotal = 0;
    $shippingCharge = 150;
    $total = 0;

    if (Auth::user()) {
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $totalCartItem = $cartItems->count();
        $subtotal = $cartItems->sum('amount');
        $total = $subtotal + $shippingCharge;
    }

    return view('frontend.cart', compact('totalCartItem', 'cartItems', 'categories', 'subtotal', 'shippingCharge', 'total'));
    
}


    public function shop()
    {
        $categories = Category::all();
        $product = Product::all();
        return view('frontend.shop', compact('product','categories'));
    }

    public function cartDelete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        toast("Item deleted from cart successfully",'success');
        return redirect()->back();
    }

    public function edit()
    {
        return view('frontend.edit');
    }
}
