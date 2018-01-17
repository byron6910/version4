<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaRequest extends FormRequest
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
            //'id_reserva'=>'max:10|required|unique:reserva,fecha_reserva',
            'fecha_reserva'=>'required|date',
            'hora_reserva'=>'required|time',
            'tipo_comprobante'=>'required|in:Comprobante,Factura',
            'num_comprobante'=>'required|numeric',
            'impuesto'=>'required|numeric',
            'total'=>'numeric',
            'estado'=>'boolean|required',//revisar tiempo
           

           'cantidad'=>'max:50|required|integer',
            'precio'=>'max:50|required|integer',
            'asiento'=>'max:50|required|integer',
        
            'id'=>'required|numeric',


            
        ];
    }
}
