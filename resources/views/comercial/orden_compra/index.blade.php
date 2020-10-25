@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST PURCHASES ORDERS
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('comercial/orden_compra/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD PURCHASE ORDER</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('comercial.orden_compra.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    {{-- <th>#</th> --}}
                    <th>CUSTOMER</th>
                    <th>ORDER NUMBER</th>
                    <th>TOTAL</th>
                    <th>PAYMENT</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($requerimiento as $req)
            <tbody>
                <tr class="text-center">
                    {{-- <td>{{ $req->id_orden_compra}}</td> --}}
                    <td>{{ $req->razon_social}}</td>
                    <td>{{ $req->num_orden}}</td>
                    <td>$ {{ $req->precio}}</td>
                    <td>{{ $req->plazo}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="#" data-target="#modal-delete-{{$req->id_orden_compra}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-ban"></i></a>  
                    </td>
                </tr>
                @include('comercial.orden_compra.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{$requerimiento->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection