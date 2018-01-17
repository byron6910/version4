<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            
            'name'=>'required',
            'email'=>'required|unique:users,country_code',
            'password'=>'required',
            'country_code' => 'required',
            'phone_number' => 'required|numeric',
             'tipo'=>'required|in:cliente,conductor,administrador',
             'ciudad'=>'required',
             'calle'=>'required',
             'postal'=>'required|numeric',
             'foto'=>'required',
             

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre Requerido',
            'email.required'  => 'Email Requerido',
            'password.required' => 'Correo Requerido',
            'country_code.required'  => 'Codigo Requerido',
            'phone_number.required' => 'Numero Requerido'

        ];
    }
}
