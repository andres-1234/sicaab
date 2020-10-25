@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST OF REQUIREMENTS
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('almacen/requerimiento_compra/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD REQUIREMENT</a>
        </li>
        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST OF REQUIREMENTS</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('almacen.requerimiento_compra.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>DATE</th>
                    <th>PROVIDER</th>
                    <th>REQUERIMENT NUMBER</th>
                    <th>TOTAL</th>
                    <th>ESTATUS</th>
                    <th>PAYMENT</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($requerimiento as $req)
            <tbody>
                <tr class="text-center">
                    <td>{{ $req->fecha_hora}}</td>
                    <td>{{ $req->razon_social}}</td>
                    <td>{{ $req->num_comprobante}}</td>
                    <td>$ {{ $req->total}}</td>
                    <td>{{ $req->estado}}</td>
                    <td>{{ $req->plazo}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('RequerimientoInternoController@show',$req->id_requerimiento)}}"  class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="#" data-target="#modal-delete-{{$req->id_requerimiento}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-ban"></i></a>  
                        <a href="{{URL::to('/requerimiento_compra/pdf')}}" class="btn btn-raised btn-primary btn-sm"><i class="fas fa-file-pdf"></i> &nbsp; GENERATE PDF</a>
                    </td>
                </tr>
                @include('almacen.requerimiento_compra.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{$requerimiento->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection