<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create(['user_id' => auth()->user()->id] + $request->all());

        if ($request->file('files')) {
            $files = $request->file('files');
            $product_id = Product::latest()->first()->id;
            foreach ($files as $file) {
                Image::create([
                    'image' => $file->store('product', 'public'),
                    'product_id' => $product_id
                ]);
            }
        }

        return back()->with('status', 'creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return View('products.edit', compact('categories'), compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->file('file')) {

            Storage::disk('public')->delete($product->image);
            $product->image = $request->file('file')->store('product', 'public');
            $product->save();
        }

        return back()->with('status', 'update with success ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = Image::where('product_id', $product->id)->get();
        $comments = Comment::where('product_id', $product->id)->get();
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if ($images) {
            foreach ($images as $image) {
                Storage::disk('public')->delete($image->image);
                $image->delete();
            }
        }
        if ($comments) {
            foreach ($comments as $commnet) {
                $commnet->delete();
            }
        }

        $product->delete();
        return back()->with('status', 'this was deleted with success');
    }
}
