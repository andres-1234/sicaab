<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use sicaab\Proveedor;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\ProveedoresFormRequest;
use Illuminate\Support\Facades\DB;
use sicaab\Exports\ProveedoresExport;
use Maatwebsite\Excel\Facades\Excel;

class ProveedoresController extends Controller
{
    //Constructor
    public function __construct()
    {
        
    }

    //Métodos

    //Método index para listar datos de la tabla
    public function index(Request $request)
    {
        //Condicional para listar datos
        if($request)
        {
            $query=trim($request->get('buscarpor'));
            $proveedor=DB::table('proveedor as prove')
            ->join('categoria_proveedor as cat','prove.id_categoria','=','cat.id_categoria')
            ->select('prove.id_proveedor','prove.nit','prove.razon_social','prove.direccion','prove.telefono','prove.correo','prove.persona_contacto','cat.categoria')
            ->where('prove.razon_social','LIKE','%'.$query.'%')
            ->orwhere('cat.categoria','LIKE','%'.$query.'%')
            ->orderby('razon_social','asc')
            ->paginate(10);
            return view('comercial.proveedores.index',["proveedor"=>$proveedor,"buscarpor"=>$query]);
        }

        //Filtro para buscar con varios parámetros
        $nombre = $request->get('buscarpor');
        $documento= $request->get('buscarpornit');

        $cliente=Proveedor::nombres($nombre)->documentos($documento);

        return view('comercial.proveedores.index',compact('Clientes'));
    }

    public function create()
    {
        $categoria=DB::table('categoria_proveedor')->get();
        return view("comercial.proveedores.create",["categoria"=>$categoria]);
    }

    public function store(ProveedoresFormRequest $request)
    {
        $proveedor=new Proveedor;
        $proveedor->id_proveedor=$request->get('id_proveedor');
        $proveedor->nit=$request->get('nit');
        $proveedor->razon_social=$request->get('razon_social');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->correo=$request->get('correo');
        $proveedor->persona_contacto=$request->get('persona_contacto');
        $proveedor->id_categoria=$request->get('id_categoria');
        $proveedor->save();
        return Redirect::to('comercial.proveedores.index');
    }

    public function show($id)
    {
        return view("comercial.proveedores.show", ["proveedor"=>Proveedor::findOrFail($id)]);
    }

    public function edit($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $categoria=DB::table('categoria_proveedor')->get();
        return view("comercial.proveedores.edit", ["proveedor"=>$proveedor,"categoria"=>$categoria]);
    }

    public function update(ProveedoresFormRequest $request,$id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->id_proveedor=$request->get('id_proveedor');
        $proveedor->nit=$request->get('nit');
        $proveedor->razon_social=$request->get('razon_social');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->telefono=$request->get('telefono');
        $proveedor->correo=$request->get('correo');
        $proveedor->persona_contacto=$request->get('persona_contacto');
        $proveedor->id_categoria=$request->get('id_categoria');
        $proveedor->update();
        return Redirect::to('comercial.proveedores.index');
    }

    public function destroy($id)
    {
       $proveedor=Proveedor::findOrFail($id);
       $proveedor->delete();
       return Redirect::to('comercial.proveedores.index');
    }

    //Método para exportar a excel
    public function export()
    {
        return Excel::download(new ProveedoresExport, 'proveedores.xlsx');
        return Redirect::to('proveedores/export');
    }
}
