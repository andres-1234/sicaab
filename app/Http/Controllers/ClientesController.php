<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use sicaab\Clientes;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\ClientesFormRequest;
use Illuminate\Support\Facades\DB;
use sicaab\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use sicaab\Imports\ClientesImport;

class ClientesController extends Controller
{
    //Constructor
    public function __construct()
    {

    }

    //Métodos

    // Método index para listar datos de la tabla
    public function index(Request $request)
    {
        // Condicional para listar datos 
        if($request)
        {
            $query=trim($request->get('buscarpor'));
            $cliente=DB::table('clientes') // sql = select * from clientes 
            ->where('razon_social','LIKE','%'.$query.'%')
            ->orwhere('nit','LIKE','%'.$query.'%')
            ->orderBy('razon_social','asc')
            ->paginate(10);
            return view('comercial.clientes.index',["cliente"=>$cliente,"buscarpor"=>$query], ["cliente"=>$cliente,"buscarpornit"=>$query]);
        }

    }

    //Métoo para ingresar datos
    public function create()
    {
        return view("comercial.clientes.create");
    }

    public function store(ClientesFormRequest $request)
    {
        $cliente=new Clientes;
        $cliente->nit=$request->get('nit');
        $cliente->razon_social=$request->get('razon_social');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->correo=$request->get('correo');
        $cliente->persona_contacto=$request->get('persona_contacto');
        $cliente->ciudad=$request->get('ciudad');
        $cliente->save();
        return Redirect::to('comercial/clientes')
        ->with("success","Cliente creado correctamente");
    }

    public function show($id)
    {
        return view("comercial.clientes.show", ["cliente"=>Clientes::findOrFail($id)]);
    }

    //Método para editar datos
    public function edit($id)
    {
        return view("comercial.clientes.edit", ["cliente"=>Clientes::findOrFail($id)]);
    }

    // Método para actualizar datos
    public function update(ClientesFormRequest $request,$id)
    {
        $cliente=Clientes::findOrFail($id);
        $cliente->nit=$request->get('nit');
        $cliente->razon_social=$request->get('razon_social');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->correo=$request->get('correo');
        $cliente->persona_contacto=$request->get('persona_contacto');
        $cliente->ciudad=$request->get('ciudad');
        $cliente->update();
        return Redirect::to('comercial/clientes');
    }

    //Método para eliminar registros
    public function destroy($id)
    {
       $cliente=Clientes::findOrFail($id);
       $cliente->delete();
       return Redirect::to('comercial/clientes');
    }

    //Método para exportar a excel
    public function export()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
        return Redirect::to('clientes/export');
    }

    //Método para importar a excel
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ClientesImport, $file);
        return Redirect::to('comercial/clientes')->with('message', 'Importación correcta');
    }


    //Exportar PDF
    public function createPDF() 
    {
        $cliente = Clientes::all();

        view()->share('clientes',$cliente);
        $pdf = PDF::loadView('comercial/clientes/pdf_view', $cliente);
        $pdf->setPaper("A4","landscape");

        return $pdf->download('pdf_file.pdf');
    }
}
