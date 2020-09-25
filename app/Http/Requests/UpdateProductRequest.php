<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'img' => '',
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

    public function updateProduct($request,$product)
    {
        if($request->file('img')){
            $path = Storage::disk('public')->put('img',$request->file('img'));
        }else{
            $path = $product->img;
        }

        $product->update([
            'img' => $path,
            'name' => $request->name,
            'price' => $request->price,
            'detail' => $request->detail,
            'categories_id' => $request->category,
        ]);

    }
}
