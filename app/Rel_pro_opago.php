<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_pro_opago extends Model
{
    //Nombre de la tabla de la bd
    protected $table='rel_prod_opago';

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
                  
    //Valores a almacenar en la tabla
    protected $fillable =[
        'precio',
        'iva',
        'total',
        'id_orden_pago',
        'id_producto',
        'id_remision'     
    ];
                  
    protected $guarded=[
                  
    ];
}
