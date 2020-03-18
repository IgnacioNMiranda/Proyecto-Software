<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            //Regex alfanumerico de máximo 50 caracteres
            'code' => 'nullable|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/',
            'name' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:projects,name,' . $this->project,
            'state' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'investigation_group_id' => 'required',
            'researchers' => 'required|array',
        ];
    }

    public function messages(){
        return [
            'code.regex' => 'Formato de código inválido',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'name.regex' => 'Formato de nombre inválido.',
            'state.required' => 'El campo estado es obligatorio.',
            'startDate' => 'El campo fecha de inicio es obligatorio.',
            'investigation_group_id.required' => 'El campo de Grupo de investigacion es obligatorio.',
            'endDate.required' => 'El campo fecha de finalización es obligatorio.',
            'researchers.required' => 'Es necesario por lo menos 1 investigador',
        ];
    }
}
