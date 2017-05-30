<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrefectureFormRequest extends FormRequest
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
            'name'                 =>  'required',
            'manager'              =>  'required',
            'phone'                =>  'required|max:15',
            'address_id'           =>  'required',
            'district'             =>  'required',
            'public_place'         =>  'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'                 =>  'Prefeitura: Preenchimento Obrigatório',
            'manager.required'              =>  'Gestor: Preenchimento Obrigatório',
            'phone.required'                =>  'Telefone: Preenchimento Obrigatório',
            'phone.max'                     =>  'Telefone: Ultrapassado o Limite',
            'address_id.required'           =>  'CEP: Preenchimento Obrigatório',
            'district.required'             =>  'Bairro: Preenchimento Obrigatório',
            'public_place.required'         =>  'Logradouro: Preenchimento Obrigatório'
        ];
    }
}
