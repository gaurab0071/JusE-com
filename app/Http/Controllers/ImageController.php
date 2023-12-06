<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('backend.upload.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.upload.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = new Image();

        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImageName = time() . $mainImage->getClientOriginalName();
            $mainImage->move('images', $mainImageName);
            $image->main_image = "images/$mainImageName";
        }

        if ($request->hasFile('offer_image1')) {
            $offerImage1 = $request->file('offer_image1');
            $offerImage1Name = time() . $offerImage1->getClientOriginalName();
            $offerImage1->move('images', $offerImage1Name);
            $image->offer_image1 = "images/$offerImage1Name";
        }

        if ($request->hasFile('offer_image2')) {
            $offerImage2 = $request->file('offer_image2');
            $offerImage2Name = time() . $offerImage2->getClientOriginalName();
            $offerImage2->move('images', $offerImage2Name);
            $image->offer_image2 = "images/$offerImage2Name";
        }

        $image->save();
        toast("Record Saved Successfully","success");
        return redirect('/backend/upload');
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
}
