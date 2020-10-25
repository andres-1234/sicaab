<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Estado_produccion extends Model
{
   //Nombre de la tabla de la bd
   protected $table='estado_produccion';

   //Definir PrimaryKey
   protected $primaryKey="id_estado";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'estado'
   ];

   protected $guarded=[

   ];
}
