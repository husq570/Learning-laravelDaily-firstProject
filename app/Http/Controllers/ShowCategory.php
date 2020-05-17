<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ShowCategory extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category', 'categories'));
    }
}
