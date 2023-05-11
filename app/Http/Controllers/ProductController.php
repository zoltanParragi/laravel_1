<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function getproducts(ProductRequest $request) {
        $request->validated();

        $products = Product::where('name', 'like', '%'.$request->name.'%')->get();

        $request->session()->flash('successmessage', 'Here they are:');
        $request->session()->flash('products', $products);
        
        return redirect()->back();
    }
}
