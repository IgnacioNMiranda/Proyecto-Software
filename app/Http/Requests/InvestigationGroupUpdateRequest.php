<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestigationGroupUpdateRequest extends FormRequest
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
        $rule = [
            'name' => 'required',
            'slug' => 'required|unique:investigation_groups,slug,' . $this->investigationGroup,
        ];

        if($this->get('logo')){
            $rules = array_merge($rule, ['logo' => 'mimes:jpg,png']);
        }

        return $rules;
    }

    public function messages(){

        return [
            'name.required' => 'Debe ingresar un nombre valido'
        ];
    }
}
