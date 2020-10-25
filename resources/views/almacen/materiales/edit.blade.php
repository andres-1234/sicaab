@extends ('layouts.admin')
@section ('contenido')

{{-- Título de página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD MATERIAL {{ $material->nombre_material}}
    </h3>
</div>

<!-- Inicio Contenido -->
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-palette"></i> &nbsp; Main principal</legend>
            
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
            <form method="POST" action="{{ route('materiales.update', $material->id_material)}}" enctype="multipart/form-data">
            @method('PUT')
            {{Form::token()}}
                        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="nombre_material" class="bmd-label-floating">Material name</label>
                            <input type="text" name="nombre_material" required value="{{$material->nombre_material}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="unidad_medida" class="bmd-label-floating">Unit of measurement</label>
                            <input type="text" name="unidad_medida" required value="{{$material->unidad_medida}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="categoria" class="bmd-label-floating">Category</label>
                            
                            {{-- Inicio listar categoría --}}
                            <select name="id_categoria" class="form-control">
                                <option>Select a category</option>
                                @foreach ($categoria as $cat)
                                    @if($cat->id_categoria==$material->id_categoria)
                                        <option value="{{$cat->id_categoria}}" selected>{{$cat->categoria}}</option>
                                    @else
                                        <option value="{{$cat->id_categoria}}">{{$cat->categoria}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- Fin listar categorías --}}
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Inicio botones --}}
            <p class="text-center" >
                <a type="reset" href="{{url('almacen/materiales')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
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