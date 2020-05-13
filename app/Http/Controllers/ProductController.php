<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:36',
        ]);

        if($request->file('image')){
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->file('image')->store('product_images', 'public'),
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }else{
            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => '',
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('products.index');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required|min:36',
        ]);

        if($request->file('image')){
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->file('image')->store('product_images', 'public'),
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }else{
            $product->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $product->image,
                'category_id' => $request->category_id,
                'description' => $request->description,
            ]);
        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
