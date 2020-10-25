<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
      //Nombre de la tabla de la bd
      protected $table='procesos';

      //Definir PrimaryKey
      protected $primaryKey="id_proceso";
   
      //Mostrar datos de actualización y creación del registro
      public $timestamps=false;
   
      //Valores a almacenar en la tabla
      protected $fillable =[
          'nombre_proceso',
          'id_categoria'
          
   
      ];
   
      protected $guarded=[
   
      ];
}
