<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Estado_pedido extends Model
{
       //Nombre de la tabla de la bd
   protected $table='estado_pedido';

  

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'id_orden_compra',
       'id_orden_produccion'
       
   ];

   protected $guarded=[

   ];
}
