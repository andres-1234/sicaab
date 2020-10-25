@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST TECHNIQUE FILE
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('produccion/ficha_tecnica/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD TECHNIQUE FILE</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('produccion.ficha_tecnica.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    {{-- <th>#</th> --}}
                    <th>PRODUCT NAME</th>
                    <th>DATE OF APROVAL</th>
                    <th>ART VERSION</th>
                    <th>HEALTH REGISTRATION</th>
                    <th>CÓDE OF BARS</th>
                    <th>CATEGORY</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($ficha as $fic)
            <tbody>
                <tr class="text-center">
                    <td>{{ $fic->nombre_producto}}</td>
                    <td>{{ $fic->fecha_aprobacion}}</td>
                    <td>{{ $fic->version_arte}}</td>
                    <td>{{ $fic->registro_sanitario}}</td>
                    <td>{{ $fic->codigo_barras}}</td>
                    <td>{{ $fic->categoria}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        {{-- <a href="{{URL::action('ArteProductoController@edit',$art->id_arte)}}" class="btn btn-info"><i class="fas fa-edit"></i></a> --}}
                        <a href="#" data-target="#modal-delete-{{$fic->id_ficha_tecnica}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('produccion.ficha_tecnica.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{-- {{$fic->render()}} --}}
</div>
{{-- Fin contenido de tabla --}}
@endsection