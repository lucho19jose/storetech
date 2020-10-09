<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function products()
    {
        return view('products', ['products' => Product::with('user')->latest()->simplePaginate()]);
    }

    public function product()
    {
        return view('product');
    }
}
