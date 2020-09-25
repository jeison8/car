<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class InsertProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'img' => 'required',
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
            'category' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El attribute es obligatorio.',
            'price.required' => 'Añade un attribute al producto',
        ];
    }

    public function insertProduct($request)
    {

        $path = Storage::disk('public')->put('img',$request->file('img'));

        Product::create([
            'img' => $path,
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail,
            'categories_id' => $request->category,
        ]);

    }
}
