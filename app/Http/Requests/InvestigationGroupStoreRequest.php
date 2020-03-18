<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationGroupStoreRequest extends FormRequest
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
        //Las reglas son definidas sobre los atributos de laravel Form.
        return [
            //Regex alfanumerico de máximo 50 caracteres
            'name' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:investigation_groups,name',
            'logo' => 'mimes:png,jpeg,jpg',
            'units' => 'required|array'
        ];
    }

    public function messages(){

        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'name.regex' => 'Formato de nombre inválido.',
            'mimes' => 'El logo debe estar en formato jpg o png.',
            'units.required' => 'Debe elegir al menos una unidad asociada.'
        ];
    }
}
