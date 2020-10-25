<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Remision extends Model
{
     //Nombre de la tabla de la bd
     protected $table='remision';

     //Definir PrimaryKey
     protected $primaryKey="id_remision";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'fecha_entrega',
         'id_orden_produccion'
     ];
  
     protected $guarded=[
  
     ];
}
