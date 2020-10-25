<?php

namespace sicaab\Imports;

use sicaab\Clientes;
use Maatwebsite\Excel\Concerns\ToModel;


class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Clientes([
            'nit' => $row[0],
            'razon_social' => $row[1],
            'direccion' => $row[2],
            'telefono' => $row[3],
            'correo' => $row[4],
            'persona_contacto' => $row[5],
            'ciudad' => $row[6]
        ]);
    }

}
