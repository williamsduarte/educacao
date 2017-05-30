<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplineFormRequest extends FormRequest
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
            'knowleadge_id'   => 'required',
            'name'            => 'required',
            'name_abr'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'knowleadge_id.required'   => 'Área de Conhecimento: Campo Obrigatório',
            'name.required'            => 'Disciplina: Campo Obrigatório',
            'name_abr.required'        => 'Abreviatura: Campo Obrigatório',
        ];
    }
}
