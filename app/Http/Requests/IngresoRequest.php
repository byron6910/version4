<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngresoRequest extends FormRequest
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
            
            //'fecha_ingreso'=>'required|date',
        
            'estado'=>'boolean|required',//revisar tiempo
            'impuesto'=>'required|numeric',
            
            'id'=>'required|numeric',

            'id_origen_destino'=>'max:10|required',
            //'id_ingreso'=>'max:10|required',
            
            'cantidad'=>'max:50|required',
            'precio_compra'=>'max:50|required',
            'precio_venta'=>'max:50|required'



        ];
    }
}
