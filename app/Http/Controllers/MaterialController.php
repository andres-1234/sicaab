<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\MaterialFormRequest;
use sicaab\Material;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use sicaab\Exports\MaterialExport;
use sicaab\Imports\MaterialImport;
use Barryvdh\DomPDF\Facade as PDF;


class MaterialController extends Controller
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
            $material=DB::table('material as mat')
            ->join('categoria_material as cat','mat.id_categoria','=','cat.id_categoria')
            ->select('mat.id_material','mat.nombre_material','mat.unidad_medida','cat.categoria')
            ->where('mat.nombre_material','LIKE','%'.$query.'%')
            ->orderBy('categoria','asc')
            ->paginate(20);
            return view('almacen.materiales.index',["material"=>$material,"buscarpor"=>$query]);
        }
    }

    public function create()
    {
        $categoria=DB::table('categoria_material')->get();
        return view("almacen.materiales.create",["categoria"=>$categoria]);
    }

    public function store(MaterialFormRequest $request)
    {
        $material=new Material;
        $material->id_material=$request->get('id_material');
        $material->nombre_material=$request->get('nombre_material');
        $material->unidad_medida=$request->get('unidad_medida');
        $material->id_categoria=$request->get('id_categoria');
        $material->save();
        return Redirect::to('almacen/materiales');
    }

    public function show($id)
    {
        return view("almacen.materiales.show", ["material"=>Material::findOrFail($id)]);
    }

    public function edit($id)
    {
        $material=Material::findOrFail($id);
        $categoria=DB::table('categoria_material')->get();
        return view("almacen.materiales.edit", ["material"=>$material,"categoria"=>$categoria]);
    }

    public function update(MaterialFormRequest $request,$id)
    {
        $material=Material::findOrFail($id);
        $material->nombre_material=$request->get('nombre_material');
        $material->unidad_medida=$request->get('unidad_medida');
        $material->id_categoria=$request->get('id_categoria');
        $material->update();
        return Redirect::to('almacen/materiales');
    }

    public function destroy($id)
    {
       $material=Material::findOrFail($id);
       $material->delete();
       return Redirect::to('almacen.materiales.index');
    }   

  //Método para exportar a excel
  public function export()
  {
      return Excel::download(new MaterialExport, 'materiales.xlsx');
      return Redirect::to('materiales/export');
  }

  //Método para importar a excel
  public function import(Request $request)
  {
      $file = $request->file('file');
      Excel::import(new MaterialImport, $file);
      return Redirect::to('almacen/materiales')->with('message', 'Importación correcta');
  }


  //Exportar PDF
  public function createPDF() 
  {
      $material = Material::all();

      view()->share('materiales',$material);
      $pdf = PDF::loadView('almacen/materiales/pdf_view', $material);
      $pdf->setPaper("A4","landscape");

      return $pdf->download('pdf_file.pdf');
  }
}

