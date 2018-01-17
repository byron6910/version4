<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrigenDestinoRequest extends FormRequest
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
            
            'origen'=>'required',
            'destino'=>'required',
            'stock'=>'max:50|required|integer',
            'fecha'=>'required|date',
            'hora'=>'required',
           // 'precio'=>'required|numeric',
            'condicion'=>'required|boolean',
            'id_cooperativa'=>'required|integer'
         



        ];
    }
}
