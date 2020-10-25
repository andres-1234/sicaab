<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    //Nombre de la tabla de la bd
    protected $table='area';

    //Definir PrimaryKey
    protected $primaryKey="id_area";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'nombre_area'
    ];

    protected $guarded=[

    ];
}
