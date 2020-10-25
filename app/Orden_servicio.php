<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Orden_servicio extends Model
{
                      //Nombre de la tabla de la bd
   protected $table='orden_servicio';

   //Definir PrimaryKey
   protected $primaryKey="id_servicio";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha_envio',
       'fecha_entrega',
       'cantidad',
       'descripcion',
       'id_orden_produccion',
       'id_proveedor'

   ];

   protected $guarded=[

   ];
}
