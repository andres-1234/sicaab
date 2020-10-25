<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Hoja_vida extends Model
{
      //Nombre de la tabla de la bd
   protected $table='hoja_vida';

   //Definir PrimaryKey
   protected $primaryKey="id_hoja_vida";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fabricante',
       'modelo',
       'peso',
       'marca',
       'funcion',
       'alto',
       'largo',
       'ancho',
       'caracteristicas',
       'año',
       'id_maq_equi'
   ];

   protected $guarded=[

   ];
}
