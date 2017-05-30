<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LegalPersonFormRequest extends FormRequest
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
            'company_name'                 =>  'required',
            'fantasy_name'                 =>  'required',
            'cnpj'                         =>  'required|max:20',
            'phone'                        =>  'required|max:15',
            'cell_phone'                   =>  'required|max:15',
            'address_id'                   =>  'required',
            'district'                     =>  'required',
            'public_place'                 =>  'required',
            'email'                        =>  'required',
            'site'                         =>  'required',
            'state_registration'           =>  'required|max:20'
        ];
    }

    public function messages()
    {
        return [
            'company_name.required'                 =>  'Razão: Preenchimento Obrigatório',
            'fantasy_name.required'                 =>  'Fantasia: Preenchimento Obrigatório',
            'cnpj.required'                         =>  'CNPJ: Preenchimento Obrigatório',
            'cnpj.max'                              =>  'CNPJ: Ultrapassado o Limite ',
            'phone.required'                        =>  'Telefone: Preenchimento Obrigatório',
            'phone.max'                             =>  'Telefone: Ultrapassado o Limite ',
            'cell_phone.required'                   =>  'Celular: Preenchimento Obrigatório',
            'cell_phone.max'                        =>  'Celular: Ultrapassado o Limite ',
            'address_id.required'                   =>  'CEP: Preenchimento Obrigatório',
            'district.required'                     =>  'Bairro: Preenchimento Obrigatório',
            'public_place.required'                 =>  'Logradouro: Preenchimento Obrigatório',
            'email.required'                        =>  'Email: Preenchimento Obrigatório',
            'site.required'                         =>  'Site: Preenchimento Obrigatório',
            'state_registration.required'           =>  'Estadual: Preenchimento Obrigatório',
            'state_registration.max'                => 'Estadual: Ultrapassado o Limite'
        ];
    }
}
