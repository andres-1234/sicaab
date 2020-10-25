<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_pro_ocompra extends Model
{
    //Nombre de la tabla de la bd
    protected $table='rel_pro_ocompra';

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
                  
    //Valores a almacenar en la tabla
    protected $fillable =[
        'id_pro_ocompra',
        'id_orden_compra',
        'id_producto',
        'cantidad',
        'precio'    
    ];
                  
    protected $guarded=[
                  
    ];
}
