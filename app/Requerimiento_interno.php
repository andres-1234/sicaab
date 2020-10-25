<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Requerimiento_interno extends Model
{
     //Nombre de la tabla de la bd
     protected $table='requerimiento_interno';

     //Definir PrimaryKey
     protected $primaryKey="id_requerimiento";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'id_proveedor',
         'num_comprobante',
         'fecha_hora',
         'estado',
         'id_pago',
         'id_planeacion'
     ];
  
     protected $guarded=[
  
     ];
}
