<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'street' => 'required|max:255',
            'number' => 'required',
            'neighborhood' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required',
            'zipcode' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'street.required' => 'O campo logradouro é obrigatório.',
            'street.max' => 'Máximo de 255 caracteres no campo logradouro.',
            'number.required' => 'O campo número é obrigatório.',
            'neighborhood.required' => 'O campo bairro é obrigatório.',
            'city.required' => 'O campo cidade é obrigatório.',
            'city.max' => 'Máximo de 255 caracteres no campo cidade.',
            'state.required' => 'O campo estado é obrigatório.',
            'zipcode.required' => 'O campo CEP é obrigatório.',
        ];
    }
}
