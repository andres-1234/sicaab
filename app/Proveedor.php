<?php

namespace sicaab;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
     //Nombre de la tabla de la bd
     protected $table='proveedor';

     //Definir PrimaryKey
     protected $primaryKey="id_proveedor";
  
     //Mostrar datos de actualización y creación del registro
     public $timestamps=false;
  
     //Valores a almacenar en la tabla
     protected $fillable =[
         'nit',
         'razon_social',
         'direccion',
         'telefono',
         'correo',
         'persona_contacto',
         'id_categoria'
     ];
  
     protected $guarded=[
  
     ];

     //Buscar con varios parámetros
    public function scopeNombres($query, $nombres)
    {
        if($nombres)
        {
            return $query->where('razon_social','LIKE',"%$nombres%");
        }
    }

    public function scopeDocumentos($query, $documentos)
    {
        if($documentos)
        {
            return $query->where('nit','LIKE',"%$documentos%");
        }
    }
}
