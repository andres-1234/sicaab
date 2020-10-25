@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; ARTS LIST
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('comercial/artes/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD ART</a>
        </li>
        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; ARTS LIST</a>
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
                    <th>PRODUCT NAME</th>
                    <th>TALL</th>
                    <th>LONG</th>
                    <th>WITDH</th>
                    <th>IMAGE</th>
                    <th>CUSTOMER</th>
                    <th>ESTATUS</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($arte as $art)
            <tbody>
                <tr class="text-center">
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