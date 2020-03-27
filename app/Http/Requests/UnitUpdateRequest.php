<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitUpdateRequest extends FormRequest
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
            'name' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:units,name,' . $this->unit,
            'country' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre para la unidad es obligatorio.',
            'name.regex' => 'Formato de nombre inválido.',
            'name.unique' => 'Este nombre de unidad ya se encuentra en uso.',
            'country.required' => 'El campo país para la unidad es obligatorio.'
        ];
    }
}
