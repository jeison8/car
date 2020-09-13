<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
    	$products = Product::with('category')->get();

    	return view('index',compact('products'));
    }

    public function detail(Request $request, Product $product)
    {
    	if($request->ajax()){
            return $product;
        }

    	return view('detail',compact('product'));
    }

    public function addCart(Product $product)
    {    	
    	return $product;
    }

}
