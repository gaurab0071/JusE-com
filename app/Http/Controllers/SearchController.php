<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Perform a search across multiple attributes
        $searchResults = Product::where('name', 'like', '%' . $query . '%')
                                ->orWhere('category', 'like', '%' . $query . '%')
                                ->orWhere('description', 'like', '%' . $query . '%')
                                ->get();

        return response()->json($searchResults);
    }
}
