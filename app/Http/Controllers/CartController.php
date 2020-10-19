<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\InsertCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cars = Vehiculo::paginate(10);

        return view('car.listCarts', compact('cars'));
    }


    public function create()
    {
        return view('car.create');
    }

    public function show(Vehiculo $car)
    {
        return view('detail', compact('car'));
    }


    public function store(InsertCartRequest $request)
    {        
        $request->insertCart($request);

        return redirect()->route('cars.index');
    }


    public function edit(Vehiculo $car)
    {
        return view('car.edit', compact('car'));
    }

    public function update(UpdateCartRequest $request, Vehiculo $car)
    {
        $request->updateCart($request, $car);

        return redirect()->route('cars.index');
    }

    public function destroy(Vehiculo $car)
    {
        $car->delete();

        return redirect()->route('cars.index');
    }

    public function addCart(Vehiculo $car)
    {
        return $car;
    }

}
