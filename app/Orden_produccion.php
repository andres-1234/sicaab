<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Orden_produccion extends Model
{
                  //Nombre de la tabla de la bd
   protected $table='orden_produccion';

   //Definir PrimaryKey
   protected $primaryKey="id_orden_produccion";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha_orden',
       'lote',
       'maculatura',
       'tamaños_buenos',
       'cnt_no_conforme',
       'cnt_aprobada',
       'cnt_entrega',
       'embalaje',
       'id_estado',
       'id_planeacion'
       
       
   ];

   protected $guarded=[

   ];
}
