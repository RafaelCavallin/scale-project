<?php

namespace App\Http\Requests\OnDuty;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOnDutyRequest extends FormRequest
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
            'user_id' => 'required',
            'location_id' => 'required',
            'date_start' => 'required|date',
            'date_finish' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O campo ID do usuário é obrigatório.',
            'location_id.required' => 'O campo ID da localização é obrigatório.',
            'date_start.required' => 'O campo data de início é obrigatório.',
            'date_start.date' => 'Data de início inválida.',
            'date_finish.required' => 'O campo data de término é obrigatório.',
            'date_finish.date' => 'Data de término inválida.',
        ];
    }
}
