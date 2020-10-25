<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
        //Nombre de la tabla de la bd
   protected $table='inspeccion';

   //Definir PrimaryKey
   protected $primaryKey="id_inspeccion";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'descripcion',
       'id_maq_equi'
       
   ];

   protected $guarded=[

   ];
}
