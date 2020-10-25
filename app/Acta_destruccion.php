<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Acta_destruccion extends Model
{
    //Nombre de la tabla de la bd
    protected $table='acta_destruccion';

    //Definir PrimaryKey
    protected $primaryKey="id_acta";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'descripcion',
        'fecha',
        'id_orden_produccion'
    ];

    protected $guarded=[

    ];
}
