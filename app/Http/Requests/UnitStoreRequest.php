<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitStoreRequest extends FormRequest
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
            'name' => 'required|unique:units,name',
            'country' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El campo nombre para la unidad es obligatorio.',
            'name.unique' => 'Este nombre de unidad ya se encuentra en uso.',
            'country.required' => 'El campo país para la unidad es obligatorio.'
        ];
    }
}
