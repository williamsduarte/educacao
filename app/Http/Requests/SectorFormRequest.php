<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectorFormRequest extends FormRequest
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
            'secretary_id'   =>  'required',
            'sector'         =>  'required',
            'branch'         =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'secretary_id.required'   =>  'Secretaria: Campo Obrigatório',
            'sector.required'         =>  'Setor: Campo Obrigatório',
            'branch.required'         =>  'Ramal: Campo Obrigatório'
        ];
    }
}
