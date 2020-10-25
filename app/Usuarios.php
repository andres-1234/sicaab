<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
     //Nombre de la tabla de la bd
     protected $table='usuarios';

     //Definir PrimaryKey
     protected $primaryKey="id_usuarios";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'activo',
         'nombre_usuario',
         'contraseña',
         'id_rol'
     ];
  
     protected $guarded=[
  
     ];
}
