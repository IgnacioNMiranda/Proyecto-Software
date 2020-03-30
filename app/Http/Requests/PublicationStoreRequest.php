<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationStoreRequest extends FormRequest
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
            'title' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:publications,title',
            'titleSecondLanguage' => 'nullable|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:publications,titleSecondLanguage',
            'publicationType' => 'required',
            'type'=>'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:publications,type',
            'researchers' => 'required|array',
            'notResearchers' => 'nullable|array',
            'date' => 'required',
            'investigation_group_id' => 'required',
            'project_id'=> 'nullable',
        ];
    }

    public function messages(){

        return [
            'title.required' => 'El campo del Titulo es obligatorio.',
            'title.regex' => 'Formato de Titulo inválido.',
            'title.unique' => 'Este Titulo ya se encuentra en uso.',
            'publicationType.required' => 'Seleccionar el Tipo de Publicacion es obligatorio.',
            'type.required' => 'Ingresar datos en Revista o Acta es obligatorio',
            'researchers.required' => 'Debe elegir al menos un investigador perteneciente al grupo de investigación',
            'date.required' => 'El campo fecha es obligatorio.',
            'investigation_group_id.required' => 'el campo grupo de investigacion es obligatorio.',
        ];
    }
}

