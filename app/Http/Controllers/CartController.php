<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addItem(Request $request, $productId)
    {
        // Retrieve product details based on $productId
        $product = Product::find($productId); // Replace with actual product retrieval logic

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }

        // Add the product to the cart
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1, // You can customize the quantity as needed
            'attributes' => [
                'size' => $request->size, 
                'color'=> $request->color,
                // Add other attributes as needed
            ],
        ]);

        return redirect()->route('frontend.cart'); // Redirect to the cart view
    }
}
