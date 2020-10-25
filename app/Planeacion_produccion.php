<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Planeacion_produccion extends Model
{
   //Nombre de la tabla de la bd
   protected $table='planeacion_produccion';

   //Definir PrimaryKey
   protected $primaryKey="id_planeacion";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'fecha_inicio',
       'fecha_entrega',
       'medida_corte',
       'tamaños',
       'sobrante',
       'total_tamaños',
       'total_pliegos',
       'id_ficha_tecnica',
       'id_orden_compra'

   ];

   protected $guarded=[

   ];
}
