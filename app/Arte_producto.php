<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Arte_producto extends Model
{
    //Nombre de la tabla de la bd
    protected $table='arte_producto';

    //Definir PrimaryKey
    protected $primaryKey="id_arte";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;

    //Valores a almacenar en la tabla
    protected $fillable =[
        'nombre_producto',
        'alto',
        'largo',
        'ancho',
        'imagen',
        'id_cliente',
        'estado'
    ];

    protected $guarded=[

    ];

    //Buscar con varios parámetros en un select
    public function scopeBuscarpor($query, $tipo, $buscar)
    {
        if(($tipo) && ($buscar))
        {
            return $query->where($tipo,'LIKE',"%$buscar%");
        }
    }

}
