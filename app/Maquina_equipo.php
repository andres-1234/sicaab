<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Maquina_equipo extends Model
{
           //Nombre de la tabla de la bd
   protected $table='maquina_equipo';

   //Definir PrimaryKey
   protected $primaryKey="id_maq_equi";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'descripcion',
       'id_categoria',
       'id_area'
       
   ];

   protected $guarded=[

   ];
}
