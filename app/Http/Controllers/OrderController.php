<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'delivery_address' => 'required',
            'city' => 'required',
            // Add other validation rules for other fields if necessary
        ]);

        // Retrieve user's details from the authenticated user
        $user = Auth::user();

        //Getting Cart Items
        $carts = Cart::where('user_id', $user->id)->get();
        //Total Amount
        $subtotal = $carts->sum('amount');
        $shippingCharge = 150;
        $total = $subtotal + $shippingCharge;

        // Check if the cart is empty
        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add items to your cart before placing an order.');
        }

        //First Step Save in Order Table
        $order = new Order();
        $order->user_id = $user->id;
        $order->name = $user->name;
        $order->email = $user->email;
        $order->mobile_number = $request->input('mobile_number');
        $order->delivery_address = $request->input('delivery_address');
        $order->city = $request->input('city');
        $order->total = $total;
        $order->save();

        foreach ($carts as $cart) {
            $od = new OrderDescription();
            $od->order_id = $order->id;
            $od->product_id = $cart->product_id;
            $od->qty = $cart->qty;
            $od->rate = $cart->selling_price;
            $od->amount = $cart->amount;
            $od->save();
        }

        foreach ($carts as $cart) {
            $cart->delete();
        }
        toast("You order has been placed", 'success');
        return redirect('/checkout');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        return view('backend.order.show', compact('order'));
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
}
