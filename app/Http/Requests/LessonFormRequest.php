<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonFormRequest extends FormRequest
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
            'school_id'    => 'required',
            'year'         => 'required',
            'start'        => 'required',
            'end'          => 'required',
            'status'       => 'required'
        ];
    }

    public function  messages()
    {
        return [
            'school_id.required'    => 'Escola: Campo Obrigatório',
            'year.required'         => 'Ano: Campo Obrigatório',
            'start.required'        => 'Data Início: Campo Obrigatório',
            'end.required'          => 'Data Fechamento: Campo Obrigatório',
            'status.required'       => 'Status: Campo Obrigatório'
        ];
    }
}
