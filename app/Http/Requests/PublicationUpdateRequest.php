<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationUpdateRequest extends FormRequest
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
            'title' => 'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:publications,title,'. $this->id,
            'titleSecondLanguage' => 'nullable|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/|unique:publications,titleSecondLanguage,'. $this->id,
            'publicationType' => 'required',
            'type'=>'required|regex:/^(?!\s*$)[-a-zA-Z0-9_:,. ]{1,50}$/',
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
            'titleSecondLanguage.regex' => 'Formato de Titulo inválido.',
            'publicationType.required' => 'Seleccionar el Tipo de Publicacion es obligatorio.',
            'type.required' => 'Ingresar datos en Revista o Acta es obligatorio',
            'researchers.required' => 'Debe elegir al menos un investigador perteneciente al grupo de investigación',
            'date.required' => 'El campo fecha es obligatorio.',
            'investigation_group_id.required' => 'El campo grupo de investigacion es obligatorio.',
        ];
    }
}
