@extends ('layouts.admin')
@section ('contenido')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> 

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST PROVIDERS
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="proveedores/create"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD PROVIDER</a>
        </li>
        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST PROVIDERS</a>
        </li>
        <li>
            <a href="{{URL::action('ProveedoresController@export')}}"><i class="fas fa-file-excel"></i> &nbsp; EXPORT TO EXCEL</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}
            
<!-- Buscar -->
@include('comercial.proveedores.search')


            
<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">

        <div class="row col-6">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>NIT</th>
                    <th>BUSINESS NAME</th>
                    <th>ADDRESS</th>
                    <th>PHONE NUMBER</th>
                    <th>E-MAIL</th>
                    <th>CONTACT PERSON</th>
                    <th>CATEGORY</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($proveedor as $prove)
            <tbody>
                <tr class="text-center">
                    <td>{{ $prove->nit}}</td>
                    <td>{{ $prove->razon_social}}</td>
                    <td>{{ $prove->direccion}}</td>
                    <td>{{ $prove->telefono}}</td>
                    <td>{{ $prove->correo}}</td>
                    <td>{{ $prove->persona_contacto}}</td>
                    <td>{{ $prove->categoria}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('ProveedoresController@edit',$prove->id_proveedor)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" data-target="#modal-delete-{{$prove->id_proveedor}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('comercial.proveedores.modal')
            @endforeach
            </tbody>
            {{-- Fin listar datos --}}
        </table>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
    </div>
    {{$proveedor->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection