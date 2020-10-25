<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Rel_ftecnica_material extends Model
{
             //Nombre de la tabla de la bd
             protected $table='rel_ftecnica_material';

         
      
             //Mostrar datos de actualización y creación del registro
             public $timestamps=false;
          
             //Valores a almacenar en la tabla
             protected $fillable =[
                 'id_ficha_tecnica',
                 'id_material'
                 
                 
                 
          
             ];
          
             protected $guarded=[
          
             ];
}
