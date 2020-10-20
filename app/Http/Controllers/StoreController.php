<?php

namespace App\Http\Controllers;


use App\Venta;
use App\Vehiculo;
use Illuminate\Http\Request;
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


    public function register(Request $request)
    {
        $articles = json_decode($request->articles);

        if(!empty($articles)){
            foreach ($articles as $key => $ids) {
               Venta::create([
                 'users_id' => auth()->user()->id,
                 'vehiculos_id' => $ids->id,
               ]); 
            }
        }else{
            return 'error';
        }
            return 'ok';     
    }


    public function buy()
    {
        $ventas = Venta::paginate(10);

        return view('buy', compact('ventas'));
    }


}
