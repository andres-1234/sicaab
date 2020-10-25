<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\Facades\Input;
use sicaab\Http\Requests\ArteProductoFormRequest;
use sicaab\Arte_producto;
use Illuminate\Support\Facades\DB;


class ArteProductoController extends Controller
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
            $arte=DB::table('arte_producto as art')
            ->join('clientes as cli','art.id_cliente','=','cli.id_cliente')
            ->select('art.id_arte','art.nombre_producto','art.alto','art.largo','art.ancho','art.imagen','cli.razon_social as cliente','art.estado')
            ->where('art.nombre_producto','LIKE','%'.$query.'%')
            ->orwhere('cli.razon_social','LIKE','%'.$query.'%')
            ->orderBy('nombre_producto','asc')
            ->paginate(5);
            return view('comercial.artes.index',["arte"=>$arte,"buscarpor"=>$query]);
        }

        //Filtro para buscar con varios parámetros en un select
        $buscar = $request->get('buscarpor');
        $tipo= $request->get('tipo');

        $arte=Arte_producto::buscarpor($tipo, $buscar);

        return view('comercial.artes.index',compact('Arte_producto'));
    }

    public function create()
    {
        $cliente=DB::table('clientes')->get();
        return view("comercial.artes.create",["cliente"=>$cliente]);
    }

    public function store(ArteProductoFormRequest $request)
    {
        $arte=new Arte_producto;
        $arte->id_arte=$request->get('id_arte');
        $arte->nombre_producto=$request->get('nombre_producto');
        $arte->alto=$request->get('alto');
        $arte->largo=$request->get('largo');
        $arte->ancho=$request->get('ancho');
        
        //Condicional para guardar la imagen del arte
        if($request->hasFile('imagen')){
            $file=$request->file("imagen");
            $nombrearchivo=$file->getClientOriginalName();
            $file->move(public_path("imagenes/artes/"),$nombrearchivo);
            $arte->imagen=$nombrearchivo;
        }
    
        $arte->id_cliente=$request->get('id_cliente');
        $arte->estado='Activo';
        $arte->save();
        return Redirect::to('comercial/artes');
    }

    public function show($id)
    {
        return view("comercial.artes.show", ["arte"=>Arte_producto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $arte=Arte_producto::findOrFail($id);
        $cliente=DB::table('clientes')->get();
        return view("comercial.artes.edit", ["arte"=>$arte,"cliente"=>$cliente]);
    }

    public function update(ArteProductoFormRequest $request,$id)
    {
        $arte=Arte_producto::findOrFail($id);
        // $arte->id_arte=$request->get('id_arte');
        $arte->nombre_producto=$request->get('nombre_producto');
        $arte->alto=$request->get('alto');
        $arte->largo=$request->get('largo');
        $arte->ancho=$request->get('ancho');
        
        //Condicional para guardar la imagen del arte
        if($request->hasFile('imagen')){
            $file=$request->file("imagen");
            $nombrearchivo=$file->getClientOriginalName();
            $file->move(public_path("imagenes/artes/"),$nombrearchivo);
            $arte->imagen=$nombrearchivo;
        }
    
        $arte->id_cliente=$request->get('id_cliente');
        $arte->estado='Activo';
        $arte->update();
        return Redirect::to('comercial/artes');
    }

    public function destroy($id)
    {
       $arte=Arte_producto::findOrFail($id);
       $arte->estado='Inactivo';
       $arte->update();
       return Redirect::to('comercial/artes');
    }
}
