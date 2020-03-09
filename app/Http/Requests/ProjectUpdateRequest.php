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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'nullable|regex:/(^[a-zA-Z]+[a-zA-Z\s_]*$)/',
            'name' => 'required|regex:/(^[a-zA-Z]+[a-zA-Z\s_]*$)/|unique:projects,name,' . $this->project,
            'state' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'investigation_group_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'name.regex' => 'Formato de nombre inválido.',
            'state.required' => 'El campo estado es obligatorio.',
            'startDate' => 'El campo fecha de inicio es obligatorio.',
            'units.required' => 'Debe elegir al menos una unidad asociada.',
            'investigation_group_id.required' => 'El campo de Grupo de investigacion es obligatorio.',
            'endDate.required' => 'El campo fecha de finalización es obligatorio.',
        ];
    }
}
