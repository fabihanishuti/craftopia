<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store image
        $filename = time() . '.' . $request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('uploads/products'), $filename);

        // Store product
        $product = new Products();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->picture = 'products/' . $filename;
        $product->save();

        return redirect()->route('welcome')->with('success', 'Product added!');
    }


    
}
