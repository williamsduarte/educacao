<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressFormRequest extends FormRequest
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
            'zipcode'    =>   'required|max:9',
            'city'       =>   'required',
            'state'      =>   'required',
        ];
    }

    public function messages()
    {
        return [
            'zipcode.required'   =>   'CEP: Preenchimento Obrigatório',
            'zipcode.max'        =>   'CEP: Ultrapassado o Limite',
            'city.required'      =>   'Cidade: Preenchimento Obrigatório',
            'state.required'     =>   'Estado: Preenchimento Obrigatório'
        ];
    }
}
