<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>INNOVA GRAPHIC | SICAAB</title>
    
    <link rel="shortcut icon" href="img/logo_innova.png">
    
    <link rel="stylesheet" href="css/estilos.css">

    <!-- Script para barra de navegación fija -->

    <script src="http://code.jquery.com/jquery-latest.js"></script>
       
    <script src="js/barra_navegacion.js"></script>

</head>

<body>
    <header>
        <div class="contenedor_nav">
        
        <!-- Barra de Navegación -->

        <nav class="menu">
            <div class="navega">
                <ul>
                    <li><a href="#inicio">Start</a></li>
                    <li><a href="#quienes_somos">About Us</a></li>
                    <li><a href="#productos">Products</a></li>
                    <li><a href="#clientes">Customers</a></li>
                    <li><a href="#pie_pagina">Contact us </a></li>
                </ul>
            </div>
            <div class="ingreso">
                <ul>
                    <li><a href="">Login</a></li>
                </ul>
            </div>
        </nav>
    </div>

     <!-- Títulos -->
     
        <section>
            <div id="inicio">
                <div class="textos">
                    <h1 class="titulo">INNOVA GRAPHIC</h1>
                    <h3 class="subtitulo">Number 1 in Folding...!</h3>
                </div>
            </div>
        </section>

        <!-- Estilo corte inferior -->

        <div class="sesgoabajo"></div>
    </header>    

        <!-- Quiénes Somos -->

    <main>
        <section id="quienes_somos">
            <div class="contenedor">
                <h2 class="quienes_somos">¿About us?</h2>
                <br>
                <p class="parrafo">We are a Colombian company founded in Bogotá in 2011. We are dedicated to the design and manufacture of folding boxes, labels, luxury cases, stationery and commercial advertising for different industrial sectors.</p>
                <p class="parrafo">We have a work team committed to continuous organizational growth and development, with a focus on operational excellence and quality standards for the satisfaction of our clients. In addition to having the latest technology and standardization of our offset printing process.</p>
            </div>
        </section>

            <!-- Galería -->

        <section class="galeria">
                
                <!-- Estilo corte superior -->

            <div class="sesgoarriba"></div>

                <!-- Imágenes -->

            <div class="imagenes">
                <img src="img/galeria_1.jpeg" alt="">
            </div>
            <div class="imagenes">
                <img src="img/galeria_2.png" alt="">
            </div>
            <div class="imagenes">
                <img src="img/2.jpg" alt="">
                <div class="mitad">
                    <img src="img/galeria_5.png" alt="">
                    <div></div>
                </div>
            </div>
            <div class="imagenes">
                <img src="img/galeria_3.png" alt="">
            </div>
            <div class="imagenes">
                <img src="img/galeria_4.png" alt="">
            </div>

                <!-- Estilo corte inferior -->

            <div class="sesgoabajo"></div>
        </section>

            <!-- Productos -->

        <section id="productos">
            <div class="contenedor">
                <h2 class="algunos_productos">Our products</h2>
                <br>
                <div class="cards">
                    <div class="card">
                        <img src="img/producto_1.png" alt="">
                        <h4><b>FOLDING BOXES</b></h4>
                    </div>
                    <div class="card">
                        <img src="img/producto_2.jpg" alt="">
                        <h4><b>LABELS</b></h4>
                    </div>
                    <div class="card">
                        <img src="img/producto_3.png" alt="">
                        <h4><b>COMMERCIAL PUBLIC</b></h4>
                    </div>
                </div>
            </div>
        </section>

            <!-- Fondo inferior -->

        <section class="fondo">
                
                <!-- Estilo corte superior -->

            <div class="sesgoarriba"></div>

                <!-- Clientes -->

            <div class="contenedor">
                <h2 class="titulo_clientes">Our customers</h2>
                <h3 class="subtitulo_clientes">
                    Meet some of our clients</h3>
                <div id="clientes">
                    <div class="cliente" align="center">
                        <img src="img/cliente_1.png" alt="">
                        <img src="img/cliente_2.png" alt="">
                        <img src="img/cliente_3.png" alt="">
                    </div>
                </div>
            </div>

                <!-- Estilo corte inferior -->

            <div class="sesgoabajo_unico"></div>
        </section>
    </main>
    
    <!-- Pie de página -->

    <footer>
        <div class="contenedor">
            <h2 class="titulo_footer">Contact us</h2>
            <div id="pie_pagina" style="margin-top: 80px">
                <form action="">
                    <input type="text" name="" id="" placeholder="Name">
                    <input type="email" name="" id="" placeholder="E-mail">
                    <textarea name="" id="" cols="30" rows="10" placeholder="enter your message..."></textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
        </div>
    </footer>
</body>
</html>
