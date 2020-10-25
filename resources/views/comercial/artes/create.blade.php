@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD PRODUCT ART
    </h3>
</div>

{{-- Inicio Contenido --}}
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-palette"></i> &nbsp; Principal Information</legend>
            
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

            {!! Form::open(array('url'=>'comercial/artes','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {!! Form::token() !!}

            {{-- Inicio Formulario --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nombre_producto" class="bmd-label-floating"> Product Name</label>
                        <input type="text" name="nombre_producto" required value="{{old('nombre_producto')}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="razon_social" class="bmd-label-floating">Customer</label>
                            
                            {{-- Inicio listar cliente --}}
                            <select name="id_cliente" class="form-control">
                                <option>Select a customer</option>
                                @foreach ($cliente as $cli)
                                    <option value="{{$cli->id_cliente}}">{{$cli->razon_social}}</option>
                                @endforeach 
                            </select>
                            {{-- Fin listar cliente --}}
                        </div>
                    </div>
                    <legend><i class="fas fa-paint-brush"></i> &nbsp; Dimensions</legend>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="alto" class="bmd-label-floating">Tall</label>
                            <input type="text"  name="alto" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="largo" class="bmd-label-floating">Long</label>
                            <input type="text"  name="largo" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="ancho" class="bmd-label-floating">Width</label>
                            <input type="text"  name="ancho" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="imagen" class="bmd-label-floating">Image</label>
                            <input type="file"  name="imagen" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin formulario --}}
            
            {{-- Inicio botones --}}
            <p class="text-center">
                <a type="reset" href="{{url('comercial/artes')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; SAVE</button>
            </p>
            {{-- Fin botones --}}
            
            {!! Form::close()!!}
        </fieldset>
    </div>
</div>
{{-- Fin contenido --}}
@endsection