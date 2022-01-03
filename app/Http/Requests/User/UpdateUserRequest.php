<?php

namespace App\Http\Requests\User;

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:App\Models\User,email',
            'type_id' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'professional_registration' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'Máximo de 255 caracteres para o campo nome.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O e-mail é inválido.',
            'email.unique' => 'O e-mail já está em uso.',
            'type_id.required' => 'O campo tipo é obrigatório.',
            'password.required' => 'O campo password é obrigatório.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'professional_registration.required' => 'O campo identidade profissional é obrigatório.',
            'professional_registration.maz' => 'Máximo de 255 caracteres para o campo identidade profissional.',
        ];
    }
}
