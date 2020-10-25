<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Tipo_mto extends Model
{
     //Nombre de la tabla de la bd
     protected $table='tipo_mto';

     //Definir PrimaryKey
     protected $primaryKey="id_tipo_mto";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'tipo'
     ];
  
     protected $guarded=[
  
     ];
}
