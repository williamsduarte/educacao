<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhysicalPersonFormRequest extends FormRequest
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
            'name'                 =>   'required',
            'cpf'                  =>   'required|max:14',
            'rg'                   =>   'required',
            'dispatcher'           =>   'required',
            'birth'                =>   'required',
            'genre_id'             =>   'required',
            'civil_id'             =>   'required',
            'phone'                =>   'required|max:15',
            'cell_phone'           =>   'required|max:15',
            'father'               =>   'required',
            'mother'               =>   'required',
            'address_id'           =>   'required',
            'district'             =>   'required',
            'public_place'         =>   'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 =>   'Nome: Preenchimento Obrigatório',
            'cpf.required'                  =>   'CPF: Preenchimento Obrigatório',
            'cpf.max'                       =>   'CPF: Ultrapassado o Limite',
            'rg.required'                   =>   'RG: Preenchimento Obrigatório',
            'dispatcher.required'           =>   'Expedidor: Preenchimento Obrigatório',
            'birth.required'                =>   'Data: Preenchimento Obrigatório',
            'genre_id.required'             =>   'Sexo: Preenchimento Obrigatório',
            'civil_id.required'             =>   'Estado Civil: Preenchimento Obrigatório',
            'phone.required'                =>   'Telefone: Preenchimento Obrigatório',
            'phone.max'                     =>   'Telefone: Ultrapassado o Limite',
            'cell_phone.required'           =>   'Celular: Preenchimento Obrigatório',
            'cell_phone.max'                =>   'Celular: Ultrapassado o Limite',
            'father.required'               =>   'Pai: Preenchimento Obrigatório',
            'mother.required'               =>   'Mãe: Preenchimento Obrigatório',
            'address_id.required'           =>   'CEP: Preenchimento Obrigatório',
            'district.required'             =>   'Bairro: Preenchimento Obrigatório',
            'public_place.required'         =>   'Logradouro: Preenchimento Obrigatório'
        ];
    }
}
