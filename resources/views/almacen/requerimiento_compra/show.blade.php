@extends ('layouts.admin')
@section ('contenido')

<!-- -- Título página -- -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; PURCHASE REQUIREMENT DETAIL
    </h3>
</div>

<!-- -- Inicio Contenido -- -->
<div class="container-fluid">
    <div class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-boxes fa-fw"></i> &nbsp; Main Principal</legend>

            <!-- -- Inicio Formulario -- -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="id_proveedor" class="bmd-label-floating">Provider</label>
                            <p>{{ $requerimientos->razon_social }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="id_pago" class="bmd-label-floating">Payment Condition</label>
                            <p>{{ $requerimientos->plazo }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="num_comprobante" class="bmd-label-floating">Requirement Number</label>
                            <p>{{ $requerimientos->num_comprobante }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="estado" class="bmd-label-floating">Estatus</label>
                            <p>{{ $requerimientos->estado }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <legend><i class="fas fa-boxes fa-fw"></i> &nbsp; Purchase Requirement Detail</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #275877; text-align:center">
                                <th>Material</th>
                                <th>Quantity</th>
                                <th>Cost Unit($)</th>
                                <th>Subtotal ($)</th>
                            </thead>
                            <tfoot>
                                
                                <th style="text-align:right">VAT</th>
                                <th><h4 id="iva" style="text-align:center">$ {{ $requerimientos->iva }}</h4></th>
                                <th style="text-align:right">TOTAL</th>
                                <th><h4 id="total" style="text-align:center">$ {{ $requerimientos->total }}</h4></th>
                            </tfoot>
                            <tbody style="text-align:center">
                                @foreach ($detalles as $det )
                                    <tr>
                                        <td>{{ $det->nombre_material}}</td>
                                        <td>{{ $det->cantidad}}</td>
                                        <td>{{ $det->vlr_unitario}}</td>
                                        <td>{{ $det->cantidad * $det->vlr_unitario}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <!-- -- Inicio botones -- -->
            <p class="text-center" >
                <a type="reset" href="{{url('almacen/requerimiento_compra')}}" class="btn btn-raised btn-success btn-sm"><i class="fas fa-check-circle"></i> &nbsp; TO ACCEPT</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
            </p>
            <!-- -- Fin botones -- -->
            <!-- -- Fin formulario -- -->
            

            
           
        </fieldset>
    </div>
</div>
<!-- Fin contenido -->

@endsection