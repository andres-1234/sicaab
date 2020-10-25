<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Orden_pago extends Model
{
                //Nombre de la tabla de la bd
   protected $table='orden_pago';

   //Definir PrimaryKey
   protected $primaryKey="id_orden_pago";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha',
       'fecha_vencimiento'
       
       
   ];

   protected $guarded=[

   ];
}
