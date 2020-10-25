<?php

namespace sicaab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequerimientoInternoFormRequest extends FormRequest
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
            'id_proveedor'=>'required',
            'num_comprobante'=>'required | max:10',
            'id_material'=>'required',
            'cantidad'=>'required',
            'vlr_unitario'=>'required',
            'id_pago'=>'required'
        ];
    }
}
