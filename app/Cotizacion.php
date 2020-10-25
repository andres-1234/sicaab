<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    //Nombre de la tabla de la bd
   protected $table='cotizacion';

   //Definir PrimaryKey
   protected $primaryKey="id_cotizacion";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha',
       'descripcion',
       'sustrato',
       'pantones',
       'cnt_inferior',
       'vunitario_inferior',
       'vtotal_inferior',
       'cnt_superior',
       'vunitario_superior',
       'vtotal_superior',
       'id_cliente',
       'id_arte'
   ];

   protected $guarded=[

   ];
}
