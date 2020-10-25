<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Ficha_tecnica extends Model
{
    //Nombre de la tabla de la bd
   protected $table='ficha_tecnica';

   //Definir PrimaryKey
   protected $primaryKey="id_ficha_tecnica";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha_aprobacion',
       'version_arte',
       'registro_sanitario',
       'codigo_barras',
       'id_producto'
   ];

   protected $guarded=[

   ];
}
