<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolFormRequest extends FormRequest
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
            'legal_person_id'       => 'required',
            'network_id'            => 'required',
            'localization_id'       => 'required'
        ];
    }
    public function messages()
    {
        return [
            'legal_person_id.required'       => 'Escola: Campo Obrigatório',
            'network_id.required'            => 'Rede de Ensino: Campo Obrigatório',
            'localization_id.required'       => 'Localização: Campo Obrigatório'
        ];
    }

}
