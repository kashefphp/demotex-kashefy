<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    public function index()
    {
        $categories= ProductCategory::with(['parent', 'details'])->get();
        return view('categories.index', compact('categories'));
    }

}
