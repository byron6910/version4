<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Detalle_Request extends FormRequest
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
           
            
            //'id_detalle'=>'max:10|required|unique:detalles,id_reserva',
            'id_origen_destino'=>'max:10|required',
            'id_reserva'=>'max:10|required',
            
            'cantidad'=>'max:50|required|integer',
            'precio_compra'=>'max:50|required|integer',
            'precio_venta'=>'max:50|required|integer',
        ];
    }
}
