<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function products()
    {
        return view('products', ['products' => Product::with('user')->latest()->simplePaginate(4)]);
    }

    public function product(Product $product)
    {
        $comments = Comment::where('product_id', $product->id)->get();
        return view('product', compact('product'), compact('comments'));
    }
}
