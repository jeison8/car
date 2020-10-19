<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class InsertUserRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zá-úÁ-ÚA-ZñÑ\s<]+$/u|min:2|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'is_admin' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'img.required' => 'campo obligatorio.',
            'name.required' => 'campo obligatorio.',
            'email.required' => 'campo obligatorio.',
            'is_admin.required' => 'campo obligatorio.',

            'img.image' => 'Debes seleccionar una imagen en jpg o png',
            'name.regex' => 'los nombres no deben contener caracteres extraños',
            'email.unique' => 'Ya existe este correo'
        ];
    }

    public function insertUser($request)
    {
        $path = Storage::disk('public')->put('img', $request->file('img'));

        User::create([
            'img' => $path,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin
        ]);
    }
}
