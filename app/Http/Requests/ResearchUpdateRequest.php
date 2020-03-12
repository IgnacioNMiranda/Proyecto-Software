<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchUpdateRequest extends FormRequest
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
            'rut' => 'required|unique:researchers,rut,'. $this->researcher,
            'researcher_name' => 'required|regex:/(^[a-zA-Z]+[ ][a-zA-Z\s]+$)/',
            'state' => 'required',
            'country' => 'required',
            'unit_id' => 'required'
        ];
    }

    public function messages(){

        return [
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'Este rut ya se encuentra en uso.',
            'researcher_name.required' => 'El campo nombre es obligatorio.',
            'researcher_name.regex' => 'Formato de nombre inválido.',
            'state.required' => 'Debe seleccionar un estado.',
            'country.required' => 'Debe seleccionar un país.',
            'unit_id.required' => 'Debe elegir al menos una unidad asociada.'
        ];
    }
}
