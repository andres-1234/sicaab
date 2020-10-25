<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     //Nombre de la tabla de la bd
     protected $table='producto';

     //Definir PrimaryKey
     protected $primaryKey="id_producto";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'vlr_unitario',
         'id_arte',
         'id_categoria'
         
  
     ];
  
     protected $guarded=[
  
     ];
}
