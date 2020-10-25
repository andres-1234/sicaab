<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Certificado_calidad extends Model
{
    //Nombre de la tabla de la bd
    protected $table='certificado_calidad';

    //Definir PrimaryKey
    protected $primaryKey="id_certificado";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'fecha',
        'id_orden_produccion'
    ];

    protected $guarded=[

    ];
}
