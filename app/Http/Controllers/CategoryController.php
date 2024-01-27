<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('images', $newName);
            $category->image = "images/$newName";
        }
        $category->save();
        toast("Record Saved Successfully", "success");
        return redirect("/backend/category");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::find($id);

        if ($categories) {
            $products = $categories->products;
            return view('frontend.category', compact('categories', 'products'));
        } else {
            // Handle the case when the category is not found
            return redirect()->route('welcome')->with('error', 'Category not found.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        toast("Record Updated Successfully", "success");
        return redirect("/backend/category");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
