<?php

namespace sicaab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArteProductoFormRequest extends FormRequest
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
            'nombre_producto'=>'required | max:100',
            'alto'=>'required | max:45',
            'largo'=>'required | max:45',
            'ancho'=>'max:45',
            'imagen'=>'required | mimes:jpeg,bmp,png,PNG',
            'id_cliente'=>'required'
        ];
    }
}
