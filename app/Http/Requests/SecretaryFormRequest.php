<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SecretaryFormRequest extends FormRequest
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
            'prefecture_id'          =>  'required',
            'name'                   =>  'required',
            'manager'                =>  'required',
            'district'               =>  'required',
            'public_place'           =>  'required',
            'phone'                  =>  'required|max:15'
        ];
    }
    public function messages()
    {
        return [
            'prefecture_id.required'             =>  'Prefeitura: Preenchimento Obrigatório',
            'name.required'                      =>  'Secretaria: Preenchimento Obrigatório',
            'manager.required'                   =>  'Gestor: Preenchimento Obrigatório',
            'district.required'                  =>  'Bairro: Preenchimento Obrigatório',
            'public_place.required'              =>  'Logradouro: Preenchimento Obrigatório',
            'phone.required'                     =>  'Telefone: Preenchimento Obrigatório',
            'phone.max'                          =>  'Telefone: Ultrapassado o Limite'
        ];
    }
}
