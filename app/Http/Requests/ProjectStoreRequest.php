<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'name' => 'required',
            'state' => 'required',
            'endDate' => 'required',
            'investigation_group_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'state.required' => 'El campo estado es obligatorio',
            'units.required' => 'Debe elegir al menos una unidad asociada.',
            'investigation_group_id.required' => 'El campo de Grupo de investigacion es obligatorio',
            'endDate.required' => 'El campo fecha de Finalizacion es obligatorio',
        ];
    }
}
