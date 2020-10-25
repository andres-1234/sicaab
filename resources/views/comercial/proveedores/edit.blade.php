@extends ('layouts.admin')
@section ('contenido')

{{-- Título de página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; EDIT PROVIDER {{ $proveedor->razon_social}}
    </h3>
</div>

<!-- Inicio Contenido -->
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Principal Information</legend>

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
            <form method="POST" action="{{ route('proveedores.update', $proveedor->id_proveedor)}}">
            @method('PUT')
            {{Form::token()}}
                        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nit" class="bmd-label-floating">NIT</label>
                            <input type="text"  name="nit" class="form-control" value="{{$proveedor->nit}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="razon_social" class="bmd-label-floating">Business Name</label>
                            <input type="text"  name="razon_social" class="form-control" value="{{$proveedor->razon_social}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Directión</label>
                            <input type="text"  name="direccion" class="form-control" value="{{$proveedor->direccion}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="telefono" class="bmd-label-floating">Phone Number</label>
                            <input type="text"  name="telefono" class="form-control" value="{{$proveedor->telefono}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="correo" class="bmd-label-floating">E-mail</label>
                            <input type="text"  name="correo" class="form-control" value="{{$proveedor->correo}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="persona_contacto" class="bmd-label-floating">Contact Person</label>
                            <input type="text"  name="persona_contacto" class="form-control" value="{{$proveedor->persona_contacto}}">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="categoria" class="bmd-label-floating">Category</label>

                            {{-- Inicio listar categoría --}}
                            <select name="id_categoria" class="form-control">
                                <option>Select a category</option>
                                @foreach ($categoria as $cat)
                                    @if($cat->id_categoria==$proveedor->id_categoria)
                                        <option value="{{$cat->id_categoria}}" selected>{{$cat->categoria}}</option>
                                    @else
                                        <option value="{{$cat->id_categoria}}">{{$cat->categoria}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- Fin listar categoría --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- Inicio botones --}}
            <p class="text-center" >
                <a type="reset" href="{{url('comercial/proveedores')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
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