<?php

namespace App\Http\Controllers;


use App\Vehiculo;
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
        $cars = Vehiculo::paginate(10);

        return view('index', compact('cars'));
    }



    public function search(Request $request)
    {
        if ($request->categories_id  == 'all') {
                return $this->index();
        }

        if ($request->find) {

            $find = $request->find;
            $cars = Vehiculo::where('nombre', 'like', '%'.$find.'%')
            ->orWhere('precio', 'like', '%'.$find.'%')->get();

        } 

        return view('index', compact('cars'));
    }

}
