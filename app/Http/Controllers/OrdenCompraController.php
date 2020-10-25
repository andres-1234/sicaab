<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\OrdenCompraFormRequest;
use sicaab\Orden_compra;
use sicaab\Rel_pro_ocompra;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon; //Zona horaria
use Response;
use Illuminate\Support\Collection;

class OrdenCompraController extends Controller
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
            $requerimiento=DB::table('orden_compra as oc')
               ->join('clientes as cli','oc.id_cliente','=','cli.id_cliente')
               ->join('rel_pro_ocompra as dc','dc.id_orden_compra','=','dc.id_orden_compra')
               ->join('condicion_pago as cp','oc.id_pago','=','cp.id_pago')
               ->select('oc.id_orden_compra','cli.razon_social','oc.num_orden','cp.plazo','dc.precio')
               ->orderBy('oc.id_orden_compra','desc')
               ->groupBy('oc.id_orden_compra','cli.razon_social','cp.plazo')
               ->where('razon_social','LIKE','%'.$query.'%')
               ->orwhere('num_orden','LIKE','%'.$query.'%')
               ->paginate(10);
               return view('comercial.orden_compra.index',["requerimiento"=>$requerimiento,"buscarpor"=>$query]);
        }
    }

    public function create()
    {
        return view("comercial.orden_compra.create");
    }
}
