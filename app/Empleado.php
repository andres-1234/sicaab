<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     //Nombre de la tabla de la bd
   protected $table='empleado';

   //Definir PrimaryKey
   protected $primaryKey="id_empleado";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'documento',
       'primer_nombre',
       'segundo_nombre',
       'primer_apellido',
       'segundo_apellido',
       'correo',
       'telefono',
       'direccion',
       'fecha_nacimiento',
       'id_usuarios',
       'id_cargo'
   ];

   protected $guarded=[

   ];
}
