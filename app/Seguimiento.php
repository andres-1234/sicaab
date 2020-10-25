<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
     //Nombre de la tabla de la bd
     protected $table='seguimiento';

     //Definir PrimaryKey
     protected $primaryKey="id_seguimiento";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'fecha',
         'horas_realizadas',
         'responsable',
         'descripcion',
         'repuesto',
         'cantidad',
         'id_programacion_mto',
         'id_hoja_vida'
     ];
  
     protected $guarded=[
  
     ];
}
