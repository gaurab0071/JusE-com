<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\productimage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percent = $request->discount_percent;
        $product->selling_price = $request->price - ($request->price * $request->discount_percent) / 100;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images', $newName);
            $product->image = "images/$newName";
        }

        $product->save();
        // Save sub-images
        if ($request->hasFile('sub_images')) {
            foreach ($request->file('sub_images') as $subImage) {
                $newName = time() . '_' . Str::random(10) . '.' . $subImage->getClientOriginalExtension();
                $subImage->move('sub_images', $newName);
                $productImage = new productimage([
                    'filename' => "sub_images/$newName",
                ]);
                $product->images()->save($productImage);
            }
        }
        toast("Record Saved Successfully", "success");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('backend.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product =  Product::find($id);
        $product->sku = $request->sku;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_percent = $request->discount_percent;
        $product->selling_price = $request->price - ($request->price * $request->discount_percent) / 100;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images', $newName);
            $product->image = "images/$newName";
        }
        $product->update();
        // Sub-images
        if ($request->hasFile('sub_images')) {
            foreach ($request->file('sub_images') as $subImage) {
                $newName = time() . '_' . Str::random(10) . '.' . $subImage->getClientOriginalExtension();
                $subImage->move('sub_images', $newName);
                $product->images()->create([
                    'filename' => "sub_images/$newName",
                ]);
            }
        }
        toast("Record Updated Successfully", "success");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toast("Record Deleted Successfully!", 'success');
        return redirect()->back();
    }
}
