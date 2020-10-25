@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD PRODUCT
    </h3>
</div>

{{-- Inicio Contenido --}}
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-boxes fa-fw"></i> &nbsp; Principal Information</legend>
            
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

            {!! Form::open(array('url'=>'comercial/productos','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {!! Form::token() !!}

            {{-- Inicio Formulario --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="nombre_producto" class="bmd-label-floating">Product Name</label>
                            
                            {{-- Inicio listar artes --}}
                            <select id="id_arte" name="id_arte " class="form-control">
                                <option>Select an art</option>
                                @foreach ($arte as $art)
                                    <option value="{{$art->id_arte}}">{{$art->nombre_producto}}</option>
                                @endforeach 
                            </select>
                            
                            {{-- Fin listar artes --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="categoria" class="bmd-label-floating">Category</label>
                            
                            {{-- Inicio listar categorias --}}
                            <select name="id_categoria" class="form-control">
                                <option>Select a category</option>
                                @foreach ($categoria as $cat)
                                    <option value="{{$cat->id_categoria}}">{{$cat->categoria}}</option>
                                @endforeach 
                            </select>
                            {{-- Fin listar categorias --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="vlr_unitario" class="bmd-label-floating">($) Unit cost</label>
                            <input type="text"  name="vlr_unitario" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin formulario --}}
            
            {{-- Inicio botones --}}
            <p class="text-center">
                <a type="reset" href="{{url('comercial/productos')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
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