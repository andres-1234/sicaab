@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST PRODUCTS
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('comercial/productos/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD PRODUCT</a>
        </li>
        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST PRODUCTS</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('comercial.productos.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>CUSTOMER</th>
                    <th>PRODUCT NAME</th>
                    <th>UNIT COST</th>
                    <th>CATEGORY</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($producto as $pro)
            <tbody>
                <tr class="text-center">
                    <td>{{ $pro->razon_social}}</td>
                    <td>{{ $pro->nombre_producto}}</td>
                    <td>$ {{ $pro->vlr_unitario}}</td>
                    <td>{{ $pro->categoria}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('ProductosController@edit',$pro->id_producto)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" data-target="#modal-delete-{{$pro->id_producto}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('comercial.productos.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{$producto->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection