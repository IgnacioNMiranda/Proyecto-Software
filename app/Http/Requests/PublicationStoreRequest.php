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
            'publicationSubType' => 'required',
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
            'title.unique' => 'Este Titulo ya se encuentra en uso.',
            'publicationType.required' => 'Seleccionar el tipo de publicación es obligatorio.',
            'publicationSubType.required' => 'Seleccionar el subtipo de publicación es obligatorio.',
            'type.required' => 'Especificar una revista o acta es obligatorio.',
            'type.regex' => 'Formato de revista o acta inválido.',
            'researchers.required' => 'Debe elegir al menos un investigador perteneciente al grupo de investigación.',
            'date.required' => 'La fecha de creación es obligatoria.',
            'investigation_group_id.required' => 'el campo grupo de investigacion es obligatorio.',
        ];
    }
}
