<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function save(Request $request, Product $product)
    {
        $comment = Comment::create($request->all() + ['user_id' => auth()->user()->id] + ['product_id' => $product->id]);
        return back();
    }
}
