<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_oproduccion_procesos extends Model
{
    //Nombre de la tabla de la bd
    protected $table='rel_oproduccion_procesos';

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
                  
    //Valores a almacenar en la tabla
    protected $fillable =[
        'inicio_proceso',
        'fin_proceso',
        'id_orden_produccion',
        'id_proceso',
        'id_empleado'     
    ];
                  
    protected $guarded=[
                  
    ];
}
