@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD TECHNIQUE FILE
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

            {!! Form::open(array('url'=>'produccion/ficha_tecnica','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {!! Form::token() !!}

            {{-- Inicio Formulario --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_cliente" class="bmd-label-floating">Cliente</label>
                            <select name="id_cliente" id="id_cliente" class="form-control">
                                <option>Select a customer</option>
                                <option>Opharm Limitada</option>
                                <option>Farmaser SA</option>
                                <option>Pinturas Tonner</option>
                                {{-- @foreach ($proveedor as $prove)
                                    <option value="{{$prove->id_proveedor}}">{{$prove->razon_social}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_producto" class="bmd-label-floating">Product</label>
                            <select name="pid_producto" id="pid_producto" class="form-control selectpicker" data-live-search="true">
                                <option>Select a product</option>
                                <option>Multisoluter x 50 ml</option>
                                <option>Opharflex</option>
                                <option>Laca automotiva cuarto plano</option>
                                <option>Humecsol 120 ml</option>
                                <option>Hydrosol 60 ml</option>
                                <option>Hydrosol 120 ml</option>
                                <option>See soft</option>
                                <option>Laca maderable catalizada</option>
                                <option>Viga sex men</option>
                                <option>Paratos miel x 120 ml</option>
                                {{-- @foreach ($material as $mat)
                                    <option value="{{$mat->id_material}}">{{$mat->material}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_producto" class="bmd-label-floating">Category</label>
                            <select name="pid_producto" id="pid_producto" class="form-control selectpicker" data-live-search="true">
                                <option>Select a Category</option>
                                <option>Caja Plegadiza</option>
                                <option>Etiqueta</option>
                                <option>Publicomercial</option>
                                {{-- @foreach ($material as $mat)
                                    <option value="{{$mat->id_material}}">{{$mat->material}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Date of approval</label>
                            <br>
                            <input type="date"  name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Art version</label>
                            <br>
                            <input type="text"  name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Health Registration </label>
                            <br>
                            <input type="text"  name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Code of bars</label>
                            <br>
                            <input type="text"  name="direccion" class="form-control">
                        </div>
                    </div>
            {{-- Fin formulario --}}
            
            {{-- Inicio botones --}}
            <p class="text-center">
                <a type="reset" href="{{url('produccion/ficha_tecnica')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
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