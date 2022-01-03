<?php

namespace App\Http\Requests\Location;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'Máximo 255 caracteres para o campo nome.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O e-mail informado é inválido.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'address_id.required' => 'O campo id do endereço é obrigatório.',
        ];
    }
}
