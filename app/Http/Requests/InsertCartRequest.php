<?php

namespace App\Http\Requests;

use App\Vehiculo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class InsertCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'img' => 'required|image|mimes:jpeg,png,jpg',
            'nombre' => 'required|regex:/^[a-zá-úÁ-ÚA-ZñÑ\s<]+$/u|min:2|max:100',
            'precio' => 'required|Integer',
            'marca' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'img.required' => 'campo obligatorio.',
            'nombre.required' => 'campo obligatorio.',
            'precio.required' => 'campo obligatorio.',
            'marca.required' => 'campo obligatorio.',

            'img.image' => 'Debes seleccionar una imagen en jpg o png',
            'nombre.regex' => 'los nombres no deben contener caracteres extraños',
            'precio.integer' => 'El precio no debe contener comas ni puntos',

        ];
    }

    public function insertCart($request)
    {
        $path = Storage::disk('public')->put('img', $request->file('img'));

        Vehiculo::create([
            'img' => $path,
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'precio' => $request->precio,
        ]);
    }
}
