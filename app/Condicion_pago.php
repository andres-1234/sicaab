<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Condicion_pago extends Model
{
   //Nombre de la tabla de la bd
   protected $table='condicion_pago';

   //Definir PrimaryKey
   protected $primaryKey="id_pago";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'tipo',
       'plazo'
   ];

   protected $guarded=[

   ];
}
