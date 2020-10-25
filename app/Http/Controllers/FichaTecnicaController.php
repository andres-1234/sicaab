<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\FichaTecnicaFormRequest;
use sicaab\Ficha_tecnica;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon; //Zona horaria
use Response;
use Illuminate\Support\Collection;

class FichaTecnicaController extends Controller
{
    //Constructor
    public function __construct()
    {
        
    }

    //Métodos
    public function index(Request $request)
    {
        if ($request) 
        {
            $query = trim($request->get('buscarpor'));
            $ficha=DB::table('ficha_tecnica as ft')
               ->join('producto as pro','ft.id_producto','=','pro.id_producto')
               ->join('arte_producto as ap','pro.id_arte','=','ap.id_arte')
               ->join('categoria_producto as cp','pro.id_categoria','=','cp.id_categoria')
               ->select('ft.id_ficha_tecnica','ap.nombre_producto','ft.fecha_aprobacion','ft.version_arte','ft.registro_sanitario','ft.codigo_barras','cp.categoria')
               ->orderBy('ft.id_ficha_tecnica','asc')
               ->groupBy('ft.id_ficha_tecnica','ft.fecha_aprobacion','ap.nombre_producto','cp.categoria')
               ->where('nombre_producto','LIKE','%'.$query.'%')
               ->paginate(10);
               return view('produccion.ficha_tecnica.index',["ficha"=>$ficha,"buscarpor"=>$query]);
        }
    }

    public function create()
    {
        return view("produccion.ficha_tecnica.create");
    }
}
