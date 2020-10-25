@extends ('layouts.admin')
@section ('contenido')

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD CUSTOMER
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

            {!! Form::open(array('url'=>'comercial/clientes','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            {{-- Inicio Formulario --}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="nit" class="bmd-label-floating">NIT</label>
                            <input type="text"  name="nit" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="razon_social" class="bmd-label-floating">Business Name</label>
                            <input type="text"  name="razon_social" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="direccion" class="bmd-label-floating">Direction</label>
                            <input type="text"  name="direccion" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="telefono" class="bmd-label-floating">Phone Number</label>
                            <input type="text"  name="telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="correo" class="bmd-label-floating">E-mail</label>
                            <input type="text"  name="correo" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="persona_contacto" class="bmd-label-floating">Contact Person</label>
                            <input type="text"  name="persona_contacto" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="ciudad" class="bmd-label-floating">City</label>
                            <input type="text"  name="ciudad" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Fin formulario --}}

            {{-- Inicio botones --}}
            <p class="text-center" >
                <a type="reset" href="{{url('comercial/clientes')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
                &nbsp; &nbsp;
                <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; SAVE</button>
            </p>
            {{-- Fin botones --}}
            <legend><i class="fas fa-user"></i> &nbsp; Import Data</legend>
            @csrf
            @if(Session::has('mesaage'))
            <p>{{ Session::get('message') }}</p>
            @endif
            <input type="file" name="file">
            <button>Import</button>
            {{!! Form::close()}}
        </fieldset>
    </div>
</div>
{{-- Fin contenido --}}
@endsection