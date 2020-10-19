<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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

    public function updateCart($request, $car)
    {
        if ($request->file('img')) {
            $path = Storage::disk('public')->put('img', $request->file('img'));
        } else {
            $path = $car->img;
        }

        $car->update([
            'img' => $path,
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'marca' => $request->marca,
        ]);
    }
}
