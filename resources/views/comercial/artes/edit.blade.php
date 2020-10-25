@extends ('layouts.admin')
@section ('contenido')

{{-- Título de página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; EDIT PRODUCT ART {{ $arte->nombre_producto}}
    </h3>
</div>

<!-- Inicio Contenido -->
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-palette"></i> &nbsp; Main Information</legend>
            
            {{-- Inicio validación de campos --}}      
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- Fin validación de campos --}}

            {{-- Inicio Formulario --}}
            <form method="POST" action="{{ route('artes.update', $arte->id_arte)}}" enctype="multipart/form-data">
            @method('PUT')
            {{Form::token()}}
                        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nombre_producto" class="bmd-label-floating">Product Name</label>
                            <input type="text" name="nombre_producto" required value="{{$arte->nombre_producto}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="razon_social" class="bmd-label-floating">Customer</label>
                            
                            {{-- Inicio listar cliente --}}
                            <select name="id_cliente" class="form-control">
                                <option>Select a customer</option>
                                @foreach ($cliente as $cli)
                                    @if($cli->id_cliente==$arte->id_cliente)
                                        <option value="{{$cli->id_cliente}}" selected>{{$cli->razon_social}}</option>
                                    @else
                                        <option value="{{$cli->id_cliente}}">{{$cli->razon_social}}</option> 
                                    @endif
                                @endforeach
                            </select>
                            {{-- Fin listar cliente --}}
                        </div>
                    </div>
                    <legend><i class="fas fa-paint-brush"></i> &nbsp; Dimensions</legend>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="alto" class="bmd-label-floating">Tall</label>
                                <input type="text"  name="alto" value="{{$arte->alto}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="largo" class="bmd-label-floating">Long</label>
                                <input type="text"  name="largo" value="{{$arte->largo}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label for="ancho" class="bmd-label-floating">witdh</label>
                                <input type="text"  name="ancho" value="{{$arte->ancho}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="imagen" class="bmd-label-floating">Image</label>
                                <input type="file"  name="imagen" class="form-control">
                                {{-- Condicional para mostrar la imagen en caso de que haya sido cargada --}}
                                @if(($arte->imagen)!="")
                                    <img src="{{asset('imagenes/artes/'.$arte->imagen)}}" height="300px" width="300px">
                                @endif
                            </div>
                        </div>
                </div>
            </div>
            
            {{-- Inicio botones --}}
            <p class="text-center" >
                <a type="reset" href="{{url('comercial/artes')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; SAVE</button>
            </p>
            {{-- Fin botones --}}
            </form>
            {{-- Fin formulario --}}
        </fieldset>
    </div>
</div>
{{-- Fin contenido --}}
@endsection