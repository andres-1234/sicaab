@extends ('layouts.admin')
@section ('contenido')

<!-- -- Título página -- -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; ADD PURCHASE REQUIREMENT
    </h3>
</div>

<!-- -- Inicio Contenido -- -->
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-boxes fa-fw"></i> &nbsp; Principal Information</legend>
            
            <!-- -- Inicio validación de campos -- -->
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- -- Fin validación de campos -- -->

            {!! Form::open(array('url'=>'almacen/requerimiento_compra','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

            <!-- -- Inicio Formulario -- -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_proveedor" class="bmd-label-floating">Provider</label>
                            <select name="id_proveedor" id="id_proveedor" class="form-control">
                                <option>Seleccione un proveedor</option>
                                @foreach ($proveedor as $prove)
                                    <option value="{{$prove->id_proveedor}}">{{$prove->razon_social}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_pago" class="bmd-label-floating">Payment Condition</label>
                            <select name="id_pago" id="id_pago" class="form-control">
                                <option>select the payment type</option>
                                @foreach ($condicion_pago as $cp)
                                    <option value="{{$cp->id_pago}}">{{$cp->plazo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="num_comprobante" class="bmd-label-floating">Requirement Number</label>
                            <input type="text" name="num_comprobante" value="{{old('num_comprobante')}}" required class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <legend><i class="fas fa-boxes fa-fw"></i> &nbsp; Details Purchase Requeriment</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="id_material" class="bmd-label-floating">Material</label>
                            <select name="pid_material" id="pid_material" class="form-control selectpicker" data-live-search="true">
                                @foreach ($material as $mat)
                                    <option value="{{$mat->id_material}}">{{$mat->material}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="cantidad">Quantity</label>
                            <input type="number" name="pcantidad" id="pcantidad" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="vlr_unitario">Cost Unit($)</label>
                            <input type="number" name="pvlr_unitario" id="pvlr_unitario" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <button type="button" id="btn_add" class="btn btn-raised btn-primary btn-sm">Add</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #275877; text-align:center">
                                <th>Options</th>
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Cost Unit($)</th>
                                <th>Subtotal ($)</th>
                            </thead>
                            <tfoot>
                                <th></th>
                                <th style="text-align:right">VAT</th>
                                <th><h4 id="iva" style="text-align:center">$ 0.00</h4></th>
                                <th style="text-align:right">TOTAL</th>
                                <th><h4 id="total" style="text-align:center">$ 0.00</h4></th>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- -- Inicio botones -- -->
                <div class="col-6 col-md-3">
                    <div class="form-group">
                        <!---- Token para transacciones-- -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-raised btn-info btn-sm" id="guardar"><i class="far fa-save"></i> &nbsp; SAVE</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a type="reset" href="{{url('almacen/requerimiento_compra')}}" class="btn btn-raised btn-danger btn-sm"><i class="fas fa-window-close"></i> &nbsp; CANCEL</a>
                    </div>
                </div>
                <!-- -- Fin botones -- -->
            </div>
            <!-- -- Fin formulario -- -->
            {!! Form::close()!!}
        </fieldset>
    </div>
</div>
<!-- Fin contenido -->

<!-- -- Inicio JavaScript -- -->
@push('scripts')
    <script>
        
        // Función inicial
        $(document).ready(function(){
            $('#btn_add').click(function(){
                agregar();
            });
        });

        // Variables
        var cont=0; //Contador
        iva = 0;
        tasa = 19;
        total = 0;
        subtotal=[]; //Array para cargar cada subtotal del item agregado al detalle
        $("#guardar").hide();

        // Función agregar
        function agregar()
        {
            id_material=$("#pid_material").val();
            material=$("#pid_material option:selected").text();
            cantidad=$("#pcantidad").val();
            vlr_unitario=$("#pvlr_unitario").val();
            
            // Validación
            if (id_material!="" && cantidad!="" && cantidad>0 && vlr_unitario!="")
            {
                subtotal[cont] = (cantidad * vlr_unitario);
                iva = (Number(iva) + Number(((subtotal[cont] * tasa)/100))).toFixed(2);
                total = (Number(total) + Number((((subtotal[cont] * tasa)/100) + subtotal[cont]))).toFixed(2);
                

                // Agregar filas
                var fila = '<tr style="text-align:center" class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" value="eliminar" onclick="eliminar('+cont+');"><i class="fas fa-minus-square"></i></button></td><td><input type="hidden" name="id_material[]" value="'+id_material+'">'+material+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="vlr_unitario[]" value="'+vlr_unitario+'"></td><td>$ '+subtotal[cont]+'</td></tr>';
                cont++;
                
                limpiar(); // Función limpiar

                $("#total").html("$ " + total);
                $("#iva").html("$ " + iva);
                
                evaluar();
                $('#detalles').append(fila); //

            }
            else
            {
                alert("Error al ingresar el detalle del requerimiento. Revise los datos ingresados");
            }
        }

        // Función para borrar los datos de los campos
        // al momento agregarlos en la tabla

        function limpiar()
        {
            $("#pcantidad").val("");
            $("#pvlr_unitario").val("");
        }

        // Función ocultar botones si no hay datos
        // ingresados en la tabla

        function evaluar()
        {
            if(total>0)
            {
                $("#guardar").show();
            }
            else
            {
                $("#guardar").hide();
            }
        }

        // Función eliminar filas
        function eliminar(index)
        { 
            total=(Number(total) - Number(((subtotal[index] * tasa)/100) + subtotal[index])).toFixed(2);
            iva = (Number(iva) - Number((subtotal[index] * tasa)/100)).toFixed(2);
            $("#total").html("$ " + total);
            $("#iva").html("$ " + iva);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endpush
@endsection