<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Orden_compra extends Model
{
               //Nombre de la tabla de la bd
   protected $table='orden_compra';

   //Definir PrimaryKey
   protected $primaryKey="id_orden_compra";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'num_orden',
       'fecha_solicitud',
       'fecha_entrega',
       'id_cliente',
       'id_pago'
       
   ];

   protected $guarded=[

   ];
}
