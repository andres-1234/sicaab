<?php

namespace sicaab\Http\Controllers;

use Illuminate\Http\Request;
use sicaab\Http\Requests;
use illuminate\Support\Facades\Redirect;
use sicaab\Http\Requests\ProductosFormRequest;
use sicaab\Producto;
use Illuminate\Support\Facades\DB;


class ProductosController extends Controller
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
            $query = trim($request -> get('buscarpor'));
            $producto = DB::table('producto as pro')
            ->join('arte_producto as art','pro.id_arte','=','art.id_arte')
            ->join('clientes as cli','art.id_cliente','=','cli.id_cliente')
            ->join('categoria_producto as cat','pro.id_categoria','=','cat.id_categoria')
            ->select('pro.id_producto','art.nombre_producto','pro.vlr_unitario','cat.categoria',"cli.razon_social")
            ->where('art.nombre_producto','LIKE','%'.$query.'%')
            ->orwhere('cli.razon_social','LIKE','%'.$query.'%')
            ->orderBy('razon_social','asc')
            ->paginate(10);
            return view('comercial.productos.index',["producto"=>$producto,"buscarpor"=>$query]);
        }
    }

    public function create()
    {
        $arte=DB::table('arte_producto')->get();
        $categoria=DB::table('categoria_producto')->get();
        $cliente=DB::table('clientes')->get();
        return view("comercial.productos.create",["arte"=>$arte,"categoria"=>$categoria, "cliente"=>$cliente]);
    }

    public function store(ProductosFormRequest $request)
    {
        $producto=new Producto;
        $producto->id_producto=$request->get('id_producto');
        $producto->vlr_unitario=$request->get('vlr_unitario');
        $producto->id_arte=$request->get('id_arte');
        $producto->id_categoria=$request->get('id_categoria');
        $producto->save();
        return Redirect::to('comercial/productos');
    }

    public function show($id)
    {
        return view("comercial.productos.show",["producto"=>Producto::findOrFail($id)]);
    }

    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $arte=DB::table('arte_producto')->get();
        $categoria=DB::table('categoria_producto')->get();
        return view("comercial.productos.edit",["producto"=>$producto, "arte"=>$arte, "categoria"=>$categoria]);
    }

    public function update(ProductosFormRequest $request, $id)
    {
        $producto=Producto::findOrFail($id);
        $producto->id_producto=$request->get('id_producto');
        $producto->vlr_unitario=$request->get('vlr_unitario');
        $producto->id_arte=$request->get('id_arte');
        $producto->id_categoria=$request->get('id_categoria');
        $producto->update();
        return Redirect::to('comercial/productos');
    }

    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        $producto->delete();
        return Redirect::to('comercial.productos.index');
    }
}
