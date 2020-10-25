<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Detalle_requerimiento extends Model
{
    //Nombre de la tabla de la bd
    protected $table='detalle_requerimiento';

    //Definir PrimaryKey
    // protected $primaryKey="id_detalle_requerimiento";

    //Mostrar datos de actualización y creación del registro
    public $timestamps=false;
                  
    //Valores a almacenar en la tabla
    protected $fillable =[
        
        'id_requerimiento',
        'id_material',
        'cantidad',
        'vlr_unitario'
    ];
                  
    protected $guarded=[
                  
    ];
}
