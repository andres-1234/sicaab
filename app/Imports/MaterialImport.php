<?php

namespace sicaab\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use sicaab\Material;

class MaterialImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material([
            'nombre_material' => $row[0],
            'unidad_medida' => $row[1],
            'categoria' => $row[2],
               
        ]);
    }

}
