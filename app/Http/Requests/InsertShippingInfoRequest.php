<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class InsertShippingInfoRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El attribute es obligatorio.',
            'email.required' => 'Añade un attribute al producto',
        ];
    }

    public function insertShippingInfo(User $user)
    {
        $data = $this->validated();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'cities_id' => $data['city'],
            'phone' => $data['phone'],
        ]);

    }
}
