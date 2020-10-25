@extends ('layouts.admin')
@section ('contenido')

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script> 

{{-- Título página --}}
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST MATERIALS
    </h3>
</div>

{{-- Inicio encabezado --}}
<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="{{url('almacen/materiales/create')}}"><i class="fas fa-plus fa-fw"></i> &nbsp; ADD MATERIAL</a>
        </li>

        <li>
            <a href="{{URL::action('MaterialController@export')}}"><i class="fas fa-file-excel"></i> &nbsp; 
                EXPORT TO EXCEL</a>
        </li>
        <li>
            <a href="{{URL::to('/materiales/pdf')}}" ><i class="fas fa-file-pdf"></i> &nbsp; 
                GENERATE PDF</a>
        </li>

        <li>
            <a class="active" ><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LIST MATERIALS</a>
        </li>
    </ul>
</div>
{{-- Fin encabezado --}}

<!-- Buscar -->
@include('almacen.materiales.search')

<!-- Inicio Contenido Tabla-->
<div class="container-fluid">
    <div class="table-responsive">

        <div class="row col-6">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>MATERIAL NAME</th>
                    <th>UNIT OF MEASUREMENT</th>
                    <th>CATEGORY</th>
                    <th>OPTIONS</th>
                </tr>
            </thead>

            {{-- Inicio listar datos --}}
            @foreach($material as $mat)
            <tbody>
                <tr class="text-center">
                    <td>{{ $mat->nombre_material}}</td>
                    <td>{{ $mat->unidad_medida}}</td>
                    <td>{{ $mat->categoria}}</td>

                    {{-- Opciones editar y eliminar --}}
                    <td>
                        <a href="{{URL::action('MaterialController@edit',$mat->id_material)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="#" data-target="#modal-delete-{{$mat->id_material}}" data-toggle="modal" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>  
                    </td>
                </tr>
                @include('almacen.materiales.modal')
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
    {{$material->render()}}
</div>
{{-- Fin contenido de tabla --}}
@endsection