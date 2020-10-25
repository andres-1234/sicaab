<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    //Nombre de la tabla de la bd
    protected $table='cargo';

    //Definir PrimaryKey
    protected $primaryKey="id_cargo";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'nombre_cargo',
        'id_area'
        
    ];

    protected $guarded=[

    ];
}
