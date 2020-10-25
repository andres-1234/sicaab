<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Entrada_material extends Model
{
      //Nombre de la tabla de la bd
   protected $table='entrada_material';

   //Definir PrimaryKey
   protected $primaryKey="id_entrada";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha_ingreso',
       'num_factura',
       'id_requerimiento'
   ];

   protected $guarded=[

   ];
}
