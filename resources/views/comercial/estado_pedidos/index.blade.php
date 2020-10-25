@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ARTES
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('comercial/artes/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ARTE</a>
        </li>
        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ARTES</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('comercial.artes.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>NOMBRE PRODUCTO</th>
                    <th>ALTO</th>
                    <th>LARGO</th>
                    <th>ANCHO</th>
                    <th>IMAGEN</th>
                    <th>CLIENTE</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($arte as $art)
            <tbody>
                <tr class="text-center">
                    <td>{{ $art->id_arte}}</td>
                    <td>{{ $art->nombre_producto}}</td>
                    <td>{{ $art->alto}}</td>
                    <td>{{ $art->largo}}</td>
                    <td>{{ $art->ancho}}</td>
                    <td>
                        <img src="{{asset('imagenes/artes/'.$art->imagen)}}" alt="{{$art->nombre_producto}}" height="100px" width="100px" class="img-thumbnail">
                    </td>
                    <td>{{ $art->cliente}}</td>
                    <td>{{ $art->estado}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('ArteProductoController@edit',$art->id_arte)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" data-target="#modal-delete-{{$art->id_arte}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('comercial.artes.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
    </div>
    {{$arte->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection