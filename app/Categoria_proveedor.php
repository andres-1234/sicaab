<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Categoria_proveedor extends Model
{
    //Nombre de la tabla de la bd
    protected $table='categoria_proveedor';

    //Definir PrimaryKey
    protected $primaryKey="id_categoria";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'categoria'
    ];

    protected $guarded=[

    ];
}
