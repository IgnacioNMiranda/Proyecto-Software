<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users,email,'. $this->user,
            'password' => 'required',
            'userType' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'El campo rut es obligatorio.',
            'password.unique' => 'Este rut ya se encuentra en uso.',
            'password.required' => 'El campo nombre es obligatorio.',
            'userType.required' => 'Debe seleccionar un estado.',
        ];
    }
}