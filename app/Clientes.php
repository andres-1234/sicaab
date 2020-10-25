<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //Nombre de la tabla de la bd
    protected $table='clientes';

    //PrimaryKey
    protected $primaryKey="id_cliente";

    //Datos de actualización y creación
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable=[
        'nit',
        'razon_social',
        'direccion',
        'telefono',
        'correo',
        'persona_contacto',
        'ciudad'
    ];

    protected $guarded=[

    ];
}
