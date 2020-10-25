<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\RequerimientoInternoFormRequest;
use sicaab\Requerimiento_interno;
use sicaab\Detalle_requerimiento;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

use Carbon\Carbon; //Zona horaria
use Response;
use Illuminate\Support\Collection;

class RequerimientoInternoController extends Controller
{
        //Constructor
        public function __construct()
        {
    
        }
    
        //Métodos
        public function index(Request $request)
        {
            //Condicional para listar datos
            if($request)
            {
               $query=trim($request->get('buscarpor'));
               $requerimiento=DB::table('requerimiento_interno as ri')
               ->join('proveedor as prove','ri.id_proveedor','=','prove.id_proveedor')
               ->join('detalle_requerimiento as dr','ri.id_requerimiento','=','dr.id_requerimiento')
               ->join('condicion_pago as cp','ri.id_pago','=','cp.id_pago')
               ->select('ri.id_requerimiento','ri.fecha_hora','prove.razon_social','ri.num_comprobante','ri.estado','cp.plazo',DB::raw('sum(dr.cantidad * vlr_unitario) as subtotal'),DB::raw('((sum(dr.cantidad * vlr_unitario)) * 0.19) as iva'),DB::raw('((sum(dr.cantidad * vlr_unitario))+((sum(dr.cantidad * vlr_unitario)) * 0.19)) as total'))
               ->where('ri.num_comprobante','LIKE','%'.$query.'%')
               ->orderBy('ri.id_requerimiento','desc')
               ->groupBy('ri.id_requerimiento','ri.fecha_hora','prove.razon_social','ri.num_comprobante','ri.estado','cp.plazo')
               ->paginate(10);
               return view('almacen.requerimiento_compra.index',["requerimiento"=>$requerimiento,"buscarpor"=>$query]);

            }
        }
    
        public function create()
        {
            $proveedor=DB::table('proveedor as prove')
                ->where('categoria','=','Material')
                ->join('categoria_proveedor as cat','prove.id_categoria','=','cat.id_categoria')
                ->select('prove.razon_social','prove.id_proveedor')
                ->get();
            $condicion_pago=DB::table('condicion_pago as cp')
                ->select('cp.tipo','cp.plazo', 'cp.id_pago')
                ->get();
            $material=DB::table('material as mat')
                ->join('categoria_material as cat','mat.id_categoria','=','cat.id_categoria')
                ->select(DB::raw('CONCAT(mat.nombre_material, " " ,cat.categoria) AS material'),'mat.id_material')
                ->get();
            return view("almacen.requerimiento_compra.create",["proveedor"=>$proveedor,"condicion_pago"=>$condicion_pago,"material"=>$material]);
        }
    
        //En esta función se almacenan los datos del requerimento interno como del detalle del requerimiento
        public function store(RequerimientoInternoFormRequest $request)
        {
           try 
           {
            // Inicio transacción   
            DB::beginTransaction();
               
               //Campos Requerimiento interno
               $requerimiento=new Requerimiento_interno();
               $requerimiento->id_proveedor=$request->get('id_proveedor');
               $requerimiento->num_comprobante=$request->get('num_comprobante');
               $mytime = Carbon::now('America/Bogota');
               $requerimiento->fecha_hora=$mytime->toDateTimeString();
               $requerimiento->estado='Activo';
               $requerimiento->id_pago=$request->get('id_pago');
               $requerimiento->save();

               //Campos Detalle requerimiento
               $id_material = $request->get('id_material');
               $cantidad = $request->get('cantidad');
               $vlr_unitario = $request->get('vlr_unitario');

               $cont = 0; //Contador del array

               //Estructura del array para almacenar los materiales
               while ($cont < count($id_material)) {
                $detalle = new Detalle_requerimiento();
                $detalle->id_requerimiento=$requerimiento->id_requerimiento;
                $detalle->id_material=$id_material[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->vlr_unitario=$vlr_unitario[$cont];
                $detalle->save();  
                $cont=$cont+1;
               }

               DB::commit(); //Confirma la transacción si no hay errores

           } catch (\Exception $e) 
           {
               DB::rollBack(); //si hay error anula la transacción
            //    Fin de la transacción
           }
           
           return Redirect::to('almacen/requerimiento_compra');
        }
    
        //Mostrar los requerimientos y los detalles en una vista
        public function show($id)
        {
            $requerimientos=DB::table('requerimiento_interno as ri')
               ->join('proveedor as prove','ri.id_proveedor','=','prove.id_proveedor')
               ->join('detalle_requerimiento as dr','ri.id_requerimiento','=','dr.id_requerimiento')
               ->join('condicion_pago as cp','ri.id_pago','=','cp.id_pago')
               ->select('ri.id_requerimiento','ri.fecha_hora','prove.razon_social','ri.num_comprobante','ri.estado','cp.plazo',DB::raw('sum(dr.cantidad * vlr_unitario) as subtotal'),DB::raw('((sum(dr.cantidad * vlr_unitario)) * 0.19) as iva'),DB::raw('((sum(dr.cantidad * vlr_unitario))+((sum(dr.cantidad * vlr_unitario)) * 0.19)) as total'))
               ->where('ri.id_requerimiento','=',$id)
               ->groupBy('ri.id_requerimiento')
               ->first();

            $detalles=DB::table('detalle_requerimiento as dr')
                ->join('material as mat','dr.id_material','=','mat.id_material')
                ->select('mat.nombre_material','dr.cantidad','dr.vlr_unitario')
                ->where('dr.id_requerimiento','=',$id)
                ->get();
            
            return view("almacen.requerimiento_compra.show",["requerimientos"=>$requerimientos,"detalles"=>$detalles]);
        }
    
        //No se elimina el registro sino que se cambia el estado a cancelado
        public function destroy($id)
        {
           $requerimientos=Requerimiento_interno::findOrFail($id);
           $requerimientos->estado='Cancelado';
           $requerimientos->id_pago='1';
           $requerimientos->update();
           return Redirect::to('almacen/requerimiento_compra');
        }

        //Generar PDF
        public function createPDF() 
    {
        $requerimientos = Requerimiento_interno::all();

        view()->share('requerimiento',$requerimientos);
        $pdf = PDF::loadView('almacen/requerimiento_compra/pdf_view', $requerimientos);
        $pdf->setPaper("A4","portrait");
        

        return $pdf->download('pdf_file.pdf');
    }
}
