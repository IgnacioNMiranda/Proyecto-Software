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
            'name' => 'required|unique:products,name,' . $this->product,
            'description' => 'required',
            'researchers' => 'required|array',
            'date' => 'required',
            'investigation_group_id' => 'required',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'description.required' => 'El campo descripcion es obligatorio.',
            'researchers.required' => 'Debe elegir al menos un investigador registrado.',
            'date.required' => 'El campo fecha es obligatorio.',
            'investigation_group_id' => 'el campo grupo de investigacion es obligatorio.',
        ];
    }
}
