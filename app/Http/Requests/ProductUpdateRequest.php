<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:products,name,' . $this->product,
            //Regex alfanumerico de máximo 500 caracteres
            'description' => 'nullable|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,500}$/',
            'researchers' => 'required|array',
            'notResearchers' => 'nullable|array',
            'date' => 'required',
            'investigation_group_id' => 'required',
            'project_id'=> 'nullable',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.regex' => 'Formato de nombre inválido.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'description.regex' => 'Formato de descripción inválido.',
            'researchers.required' => 'Debe elegir al menos un investigador perteneciente al grupo de investigación',
            'date.required' => 'El campo fecha es obligatorio.',
            'investigation_group_id.required' => 'el campo grupo de investigacion es obligatorio.',
        ];
    }
}
