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
        return [
            'name' => 'required|regex:/(^[a-zA-Z]+[a-zA-Z\s_]*$)/|unique:investigation_groups,name,' . $this->invGroup,
            'logo' => 'mimes:png,jpeg,jpg',
            'units' => 'required|array'
        ];
    }
    

    public function messages(){

        return [
            'name.required' => 'Debe ingresar un nombre valido',
            'name.unique' => 'Este nombre ya se encuentra en uso',
            'mimes' => 'El logo debe estar en formato jpg o png',
            'units.required' => 'Debe elegir al menos una unidad asociada.'
        ];
    }
}
