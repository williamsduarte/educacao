<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
            'course'             => 'required',
            'initials'           => 'required|max:5',
            'stage'              => 'required',
            'workload'           => 'required|max:10',
            'objective'          => 'required',
            'target'             => 'required',
            'level_id'           => 'required',
            'type_id'            => 'required',
            'regime_id'          => 'required'
        ];
    }

    public function messages()
    {
        return [
            'course.required'           => 'Curso: Campo Obrigatório',
            'initials.required'         => 'Sigla: Campo Obrigatório',
            'initials.max'              => 'Sigla: Ultrapassado o Limite',
            'stage.required'            => 'Quant. Etapas: Campo Obrigatório',
            'workload.required'         => 'Carga Horária: Campo Obrigatório',
            'workload.max'              => 'Carga Horária: Ultrapassado o Limite',
            'objective.required'        => 'Objetivo do Curso: Campo Obrigatório',
            'target.required'           => 'Publico Alvo: Campo Obrigatório',
            'level_id.required'         => 'Nível de Ensino: Selecione uma Opção',
            'type_id.required'          => 'Tipo de Ensino: Selecione uma Opção',
            'regime_id.required'        => 'Regime: Selecione uma Opção'
        ];
    }
}
