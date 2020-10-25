@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; CUSTOMERS LIST
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="clientes/create"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD CUSTOMER</a>
        </li>
        <li>
            <a href="{{URL::action('ClientesController@export')}}"><i class="fas fa-file-excel"></i> &nbsp; 
                EXPORT TO EXCEL</a>
        </li>
        <li>
            <a href="{{URL::to('/clientes/pdf')}}" ><i class="fas fa-file-pdf"></i> &nbsp; 
                GENERATE PDF</a>
        </li>
  
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('comercial.clientes.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>NIT</th>
                    <th>BUSINESS NAME</th>
                    <th>DIRECTIÓN</th>
                    <th>PHONE</th>
                    <th>E-MAIL</th>
                    <th>CONTACT PERSON</th>
                    <th>CITY</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($cliente as $cli)
            <tbody>
                <tr class="text-center">
                    <td>{{ $cli->nit}}</td>
                    <td>{{ $cli->razon_social}}</td>
                    <td>{{ $cli->direccion}}</td>
                    <td>{{ $cli->telefono}}</td>
                    <td>{{ $cli->correo}}</td>
                    <td>{{ $cli->persona_contacto}}</td>
                    <td>{{ $cli->ciudad}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('ClientesController@edit',$cli->id_cliente)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" data-target="#modal-delete-{{$cli->id_cliente}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('comercial.clientes.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{$cliente->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection