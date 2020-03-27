<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Research_userUpdateRequest extends FormRequest
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
            'passport' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:researchers,passport,'. $this->researcher_id, 
            //Regex alfanumerico que toma nombre y apellido
            'researcher_name' => 'required|regex:/^[a-zA-Z\s]+$/',
            'state' => 'required',
            'country' => 'required',
            'unit_id' => 'required',
            'investigation_groups' => 'required|array',
        ];
    }

    public function messages(){

        return [
            'passport.required' => 'El número de pasaporte es obligatorio.',
            'passport.unique' => 'Este pasaporte ya se encuentra en uso.',
            'passport.regex' => "Formato de pasaporte invalido. Asegúrese que solo contiene letras y números.",
            'researcher_name.required' => 'El campo nombre es obligatorio.',
            'researcher_name.regex' => 'Formato de nombre inválido.',
            'state.required' => 'Debe seleccionar un estado.',
            'country.required' => 'Debe seleccionar un país.',
            'unit_id.required' => 'Debe elegir al menos una unidad asociada.',
            'investigation_groups.required' => 'Debe elegir al menos un grupo de investigacion asociado.'
        ];
    }
}
