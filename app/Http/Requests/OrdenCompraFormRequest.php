<?php

namespace sicaab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdenCompraFormRequest extends FormRequest
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
            'num_orden'=>'requiered',
            'fecha_solicitud'=>'requiered',
            'fecha_entrega'=>'requiered',
            'id_cliente'=>'requiered',
            'id_pago'=>'requiered'
        ];
    }
}
