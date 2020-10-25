<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_ftecnica_procesos extends Model
{
    //Nombre de la tabla de la bd
    protected $table='rel_ftecnica_procesos';

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
              
    //Valores a almacenar en la tabla
    protected $fillable =[
        'id_ficha_tecnica',
        'id_proceso'      
    ];
              
    protected $guarded=[
              
    ];
}
