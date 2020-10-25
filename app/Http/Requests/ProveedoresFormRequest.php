<?php

namespace sicaab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresFormRequest extends FormRequest
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
            'nit'=>'required | max:45',
            'razon_social'=>'required | max:100',
            'direccion'=>'required | max:100',
            'telefono'=>'required | max:20',
            'correo'=>'required | max:50',
            'persona_contacto'=>'required | max:100',
            'id_categoria'=>'required'
        ];
    }
}
