<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'physical_person_id'       => 'required',
            'sector_id'                => 'required',
            'link_id'                  => 'required',
            'condition_id'             => 'required',
        ];
    }
    public function messages()
    {
        return [
            'physical_person_id.required'       => 'Nome: Campo Obrigatório',
            'sector_id.required'                => 'Setor: Campo Obrigatório',
            'link_id.required'                  => 'Vínculo: Campo Obrigatório',
            'condition_id.required'             => 'Status: Campo Obrigatório',
        ];
    }
}
