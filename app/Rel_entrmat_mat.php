<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_entrmat_mat extends Model
{
         //Nombre de la tabla de la bd
         protected $table='rel_entmat_mat';

         
      
         //Mostrar datos de actualización y creación del registro
         public $timestamps=false;
      
         //Valores a almacenar en la tabla
         protected $fillable =[
             'cantidad',
             'id_material',
             'id_entrada'
             
             
      
         ];
      
         protected $guarded=[
      
         ];
}
