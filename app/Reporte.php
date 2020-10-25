<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
     //Nombre de la tabla de la bd
     protected $table='reporte';

     //Definir PrimaryKey
     protected $primaryKey="id_reporte";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'fecha',
         'descripcion',
         'id_inspeccion',
         'id_empleado'
     ];
  
     protected $guarded=[
  
     ];
}
