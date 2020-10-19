<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'img' => 'image|mimes:jpeg,png,jpg',
            'name' => 'required|regex:/^[a-zá-úÁ-ÚA-ZñÑ\s<]+$/u|min:2|max:100',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'is_admin' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'campo obligatorio.',
            'email.required' => 'campo obligatorio.',
            'is_admin.required' => 'campo obligatorio.',

            'img.image' => 'Debes seleccionar una imagen en jpg o png',
            'name.regex' => 'los nombres no deben contener caracteres extraños',
            'email.unique' => 'Ya existe este correo'
        ];
    }

    public function updateUser($request, $user)
    {
        if ($request->file('img')) {
            $path = Storage::disk('public')->put('img', $request->file('img'));
        } else {
            $path = $user->img;
        }

        $user->update([
            'img' => $path,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) ?? Hash::make($user->password),
            'is_admin' => $request->is_admin
        ]);
    }

}
