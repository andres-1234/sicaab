<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Programacion_mto extends Model
{
      //Nombre de la tabla de la bd
      protected $table='programacion_mto';

      //Definir PrimaryKey
      protected $primaryKey="id_programacion_mto";
   
      //Mostrar datos de actualización y creación del registro
      public $timestamps=false;
   
      //Valores a almacenar en la tabla
      protected $fillable =[
          'fecha_inicio',
          'fecha_fin',
          'horas_previstas',
          'observaciones',
          'id_tipo_mto',
          'id_reporte'
          
   
      ];
   
      protected $guarded=[
   
      ];
}
