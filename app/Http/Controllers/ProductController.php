<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)

    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'photos' => '',
            'price' => 'required',
            'discount' => 'required',
            'slug' => 'required',
        ]);

        $product = new Product();

        $product->category_id = $validated['category_id'];
            $product->name = $validated['name'];
            $product->details = $validated['details'];
            $product->photos = $validated['photos'];
            $product->price = $validated['price'];
            $product->discount = $validated['discount'];
            $product->slug = $validated['slug'];

        $product->save();
    }
}



















