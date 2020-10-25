<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
             //Nombre de la tabla de la bd
   protected $table='material';

   //Definir PrimaryKey
   protected $primaryKey="id_material";

   //Mostrar datos de actualización y creación del registro
   public $timestamps=false;

   //Valores a almacenar en la tabla
   protected $fillable =[
       'nombre_material',
       'unidad_medida',
       'id_categoria'
       
   ];

   protected $guarded=[

   ];
}
