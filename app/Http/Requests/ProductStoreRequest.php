<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:Product,name,' . $this->product,
            'description' => 'required',
            'researcher_id' => 'required|array',
            'date' => 'required',
            'slug' => 'required|unique:products,slug' . $this->product,
            'investigation_group_id' => 'required',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.unique' => 'Este nombre ya se encuentra en uso.',
            'description.required' => 'El campo descripcion es obligatorio.',
            'researcher_id.required' => 'Debe elegir al menos un investigador registrado.',
            'date.required' => 'El campo fecha es obligatorio.',
            'investigation_group_id' => 'el campo grupo de investigacion es obligatorio.',
        ];
    }
}
