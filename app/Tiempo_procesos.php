<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Tiempo_procesos extends Model
{
     //Nombre de la tabla de la bd
     protected $table='tiempo_procesos';

     //Definir PrimaryKey
     protected $primaryKey="id_tiempo";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'tiempo_preparacion',
         'tiempo_muerto',
         'tiempo_proceso',
         'id_proceso'
     ];
  
     protected $guarded=[
  
     ];
}
