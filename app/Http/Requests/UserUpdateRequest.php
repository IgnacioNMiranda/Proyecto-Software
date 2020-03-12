<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            //Contraseña de al menos 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y longitud >= 8
            'password' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,}$/',
            'userType' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.unique' => 'Ya existe un usuario con este correo.',
            'email.required' => 'El campo email es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.regex' => 'La contraseña debe poseer al menos 1 mayúscula, 1 minúscula, 1 número, 1 carácter especial y debe tener una longitud superior a 8 caracteres.',
            'userType.required' => 'Debe seleccionar un tipo de usuario.',
        ];
    }
}