<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_salmat_mat extends Model
{
    //Nombre de la tabla de la bd
    protected $table='rel_salmat_mat';

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
                  
    //Valores a almacenar en la tabla
    protected $fillable =[
        'cantidad',
        'id_material',
        'id_salida'   
    ];
                  
    protected $guarded=[
                  
    ];
}
