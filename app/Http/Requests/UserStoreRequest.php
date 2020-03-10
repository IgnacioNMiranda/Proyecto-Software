<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|unique:users,email',
            //Contraseña de al menos 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y longitud >= 8
            'password' => 'required|regex:^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$',
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
