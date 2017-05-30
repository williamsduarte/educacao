<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'employee_id'       => 'required',
            'nickname'          => 'required',
            'email'             => 'required',
            'password'          => 'required',
            'phrase'            => 'required'
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required'       => 'Nome: Campo Obrigatório',
            'nickname.required'          => 'Nickname: Campo Obrigatório',
            'email.required'             => 'Login: Campo Obrigatório',
            'password.required'          => 'Senha: Campo Obrigatório',
            'phrase.required'            => 'Frase: Campo Obrigatório',
        ];
    }
}
