<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Salida_material extends Model
{
     //Nombre de la tabla de la bd
     protected $table='salida_material';

     //Definir PrimaryKey
     protected $primaryKey="id_salida";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'fecha_salida',
         'id_orden_produccion'
     ];
  
     protected $guarded=[
  
     ];
}
