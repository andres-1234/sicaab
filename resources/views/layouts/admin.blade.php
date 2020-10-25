<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>SICAAB</title>
    
    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">

    <!-- Bootstrap V4 / Bootstrap Material Design V4 / Bootstrap Select -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-material-design.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-select.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/all.css')}}">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="{{asset('/css/sweetalert2.min.css')}}">

    <!-- Sweet Alert V8.13.0 JS file -->
    <script src="{{asset('/js/sweetalert2.min.js')}}"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="{{asset('/css/jquery.mCustomScrollbar.css')}}">

    <!-- Estilos General -->
    <link rel="stylesheet" href="{{asset('/css/style-general.css')}}">

</head>
<body>
    
    <!-- Inicio Contenedor Principal -->
    <main class="full-box main-container">
        
        <!-- Inicio Nav lateral -->
        <section class="full-box nav-lateral">
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
                <figure class="full-box nav-lateral-avatar">
                    <i class="far fa-times-circle show-nav-lateral"></i>
                    <img src="{{asset('/img/Avatar.png')}}" class="img-fluid" alt="Avatar">
                    <figcaption class="roboto-medium text-center">
                        Name <br><small class="roboto-condensed-light">Position</small>
                        <br><small class="roboto-condensed-light">User Name</small>
                    </figcaption>
                </figure>
                <div class="full-box nav-lateral-bar"></div>
                <nav class="full-box nav-lateral-menu">
                    <ul>
                        <li>
                            <a href="index-si.html"><i class="fas fa-tachometer-alt"></i> &nbsp; Dashboard</a>
                        </li>

                        <!-- Inicio Módulo Comercial -->
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-wallet fa-fw"></i> &nbsp; Commercial <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                <a href="{{url('comercial/artes')}}"><i class="fas fa-paint-roller fa-fw"></i> &nbsp; Product Art</a>
                                </li>
                                <li>
                                    <a href="{{url('comercial/clientes')}}"><i class="fas fa-users fa-fw"></i> &nbsp; Customers </a>
                                </li>
                                {{-- <li>
                                    <a href="{{url('comercial/cotizaciones')}}"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Cotizaciones</a>
                                </li>
                                <li>
                                    <a href="{{url('comercial/estado_pedidos')}}"><i class="fas fa-stopwatch fa-fw"></i> &nbsp; Estado de Pedido</a>
                                </li> --}}
                                 <li>
                                    <a href="{{url('comercial/orden_compra')}}"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Purchase Order</a>
                                </li>   
                                {{-- <li>
                                    <a href="{{url('comercial/orden_pago')}}"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Orden de Pago</a>
                                </li> --}}
                                <li>
                                    <a href="{{url('comercial/productos')}}"><i class="fas fa-boxes fa-fw"></i> &nbsp; Products</a>
                                </li>
                                <li>
                                <a href="{{url('comercial/proveedores')}}"><i class="fas fa-users fa-fw"></i> &nbsp; Providers</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Fin Módulo Comercial -->
                        
                        <!-- Inicio Módulo Producción -->
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-industry fa-fw"></i> &nbsp; Productión <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                {{-- <li>
                                    <a href="{{url('produccion/acta_destruccion')}}"><i class="fas fa-ban fa-fw"></i> &nbsp; Acta de Destrucción</a>
                                </li>
                                <li>
                                    <a href="{{url('produccion/certificado_calidad')}}"><i class="fas fa-clipboard-check fa-fw"></i> &nbsp; Certificado de Calidad</a>
                                </li> --}}
                                <li>
                                    <a href="{{url('produccion/ficha_tecnica')}}"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; TECHNIQUE FILE</a>
                                </li>
                                {{-- <li>
                                    <a href="{{url('produccion/orden_produccion')}}"><i class="fas fa-file-alt fa-fw"></i> &nbsp; Orden de Producción</a>
                                </li>
                                <li>
                                    <a href="{{url('produccion/orden_servicio')}}"><i class="fas fa-dolly-flatbed fa-fw"></i> &nbsp; Orden de Servicio</a>
                                </li>
                                <li>
                                    <a href="{{url('produccion/planeacion')}}"><i class="fas fa-puzzle-piece fa-fw"></i> &nbsp; Planeación de Producción</a>
                                </li>  --}}
                            </ul>
                        </li>
                        <!-- Fin Módulo Producción -->
                        
                        <!-- Inicio Módulo Almacén y Logística -->
                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-truck fa-fw"></i> &nbsp; Warehouse and Logistics <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="{{url('almacen/materiales')}}"><i class="fas fa-boxes fa-fw"></i> &nbsp; Materials</a>
                                </li>
                                {{-- <li>
                                    <a href="{{url('almacen/remisiones')}}"><i class="fas fa-shipping-fast fa-fw"></i> &nbsp; Remisiones </a>
                                </li> --}}
                                <li>
                                    <a href="{{url('almacen/requerimiento_compra')}}"><i class="fas fa-file-invoice fa-fw"></i> &nbsp; Purchase Requirement </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Fin Módulo Almacén y Logística -->
                        
                        <!-- Inicio Módulo Mantenimiento -->
                        {{-- <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-screwdriver"></i> &nbsp; Mantenimiento<i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="{{url('mantenimiento/hoja_vida')}}"><i class="fas fa-clipboard fa-fw"></i> &nbsp; Hoja de Vida</a>
                                </li>
                                <li>
                                    <a href="{{url('mantenimiento/inspeccion')}}"><i class="fas fa-clipboard-check fa-fw"></i> &nbsp; Inspección</a>
                                </li>
                                <li>
                                    <a href="{{url('mantenimiento/programacion')}}"><i class="fas fa-calendar-day fa-fw"></i> &nbsp; Programación de Mantenimiento</a>
                                </li>
                                <li>
                                    <a href="{{url('mantenimiento/reporte')}}"><i class="fas fa-file-alt fa-fw"></i> &nbsp; Reporte</a>
                                </li>
                            </ul>
                        </li> --}}
                        <!-- Fin Módulo Mantenimiento -->
                        
                        <!-- Inicio Módulo Administrador -->
                        {{-- <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-tools"></i> &nbsp; Administrador <i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="{{url('usuarios/usuarios')}}"><i class="fas fa-portrait fa-fw"></i> &nbsp; Usuarios</a>
                                </li>
                            </ul>
                        </li> --}}
                        <!-- Fin Módulo Administrador -->
                         <!-- boton enviar mensaje-->
                       <br>

                       <form>
                           @csrf
                           <button>
                               <a class="{{ request()->routeIs('contact')}}" href="/contact">
                                   Enviar mensaje
                               </a>
                           </button>
                       </form>

                       <!-- Fin boton enviar -->

                    </ul>
                </nav>
            </div>
        </section>
        <!-- Fin Nav lateral -->

        <!-- Inicio Contenido Página -->
        <section class="full-box page-content">
            
            <!-- Inicio nav superior -->
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Fin nav superior -->
            
            <!-- Contenido -->
            <!-- -- Se integran las plantillas blade de cada vista -- -->
            @yield('contenido')
            <!-- Fin Contenido --> 
        </section>
    </main>

    <!-- Archivos JavaScript -->
    <!-- jQuery V3.4.1 -->
    <script src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/js/jquery.js')}}"></script>
    @stack('scripts')

    <!-- Popper -->
    <script src="{{asset('/js/popper.min.js')}}"></script>

    <!-- Bootstrap V4 / Bootstrap Material Design V4 / Bootstrap Select -->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap-material-design.min.js')}}"></script>
    <script>$(document).ready(function(){$('body').bootstrapMaterialDesign(); });</script>
    <script src="{{asset('/js/bootstrap-select.min.js')}}"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <script src="{{asset('/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- Script General -->
    <script src="{{asset('/js/script-general.js')}}"></script>

    <!-- jQuery Chart -->
    <script src="{{asset('/js/chart.min.js')}}"></script>
    <script src="{{asset('/js/chart-data.js')}}"></script>
    <script>
        window.onload = function(){
            var chart2 = document.getElementById("bar-chart").getContext("2d");
            window.myBar = new Chart(chart2).Bar(barChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#C5C7CC"
            });
        };
    </script>

    {{-- JS Render --}}
    <script src="{{asset('/js/js-render.js')}}"></script>
    <script src="{{asset('/js/npm.js')}}"></script>
</body>
</html>