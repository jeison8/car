<?php

namespace App\Http\Controllers;

use App\City;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InsertShippingInfoRequest;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['shippingInfo']);
    }


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


    public function order()
    {       
        if (Auth::check())
        {
            return $this->redirections();
        }

        return view('order');
    }


    public function shippingInfo()
    {       
        return $this->redirections();
    }


    public function redirections()
    {       
        $user = User::where('id',Auth::user()->id)->first();

        $cities = City::all();

        return view('shippingInfo',compact('user','cities'));
    }


}
