<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/estilo_Modificación_Index.css" id="estilo">
    <link rel="stylesheet" type="text/css" href="../styles/estilo_Envio_Correo.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Pankey</title>
    <style id="est_ver_categorías">
        #Catalogo:hover #Menu_Catalogo {
            visibility: visible;
        }
    </style>
    <style>
        #Contenido_Cabecera,
        #contenido_principal,
        footer {
            opacity: 0.5;
        }

        #Salto {
            background: #0000007a;
            font-family: Sanseriffic;
            letter-spacing: 1.4px;
            transition: initial;
        }

        #VentanaForm {
            width: 98.3vw;
            display: flex;
            justify-content: center;
            height: 75vh;
            align-items: center;
        }

        #VentanaForm * {
            color: black;
        }

        #Ventana {
            background-color: aliceblue !important;
            width: 550px;
            height: 75vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border-radius: 40px;
            z-index: 1;
        }

        .Mensaje {
            height: auto !important;
        }

        .Recuperación {
            height: 58vh !important;
        }

        #Ventana>* {
            background-color: transparent !important;
        }

        label {
            padding: 0px 10px;
        }

        #SinCuenta {
            display: flex;
            align-items: center;
        }

        #ingresar,
        #sin_cuenta {
            padding: 10px;
        }

        .btnHaciaDerecha {
            display: flex;
            width: 100%;
            justify-content: flex-end;
        }

        #Ventana>input,
        #SinCuenta>input,
        .btnHaciaDerecha>input,
        #Ventana>button {
            border: 1px solid;
            border-color: black;
            width: auto;
        }

        #contraseña_olvidada {
            border-color: transparent;
            text-decoration: underline;
        }

        .entrada_texto {
            width: 20vw !important;
            cursor: auto !important;
        }

        #btn_salir {
            border-color: transparent;
            font-size: 30px;
            padding: 0px;
        }

        h3 {
            visibility: hidden;
        }

        .Mensaje p {
            margin: 0px;
            padding: 22px 0px;
        }

        .Mensaje h2 {
            margin: 0px;
            padding: 10px 0px;
        }

        .Recuperación h2 {
            margin: 0px;
        }
    </style>
</head>

<body class="vsc-initialized">
    <input type="checkbox" id="check2">
    <header id="Cabecera">
        <div id="Contenido_Cabecera">
            <img src="../imagenes/LOGO_PANKEY1.png" alt="LOGO_PANKEY" id="LogoPankey">
            <input type="checkbox" id="check">
            <label for="check" class="mostrar_menu">
                ≡
            </label>
            <div id="botones_iconos">
                <section id="seccion_botones">
                    <a href="index.php">Inicio</a>
                    <a href="SobreNosotros.php">Sobre nosotros</a>
                    <div id="Catalogo">
                        <input class="Btn_Catalogo" type="button" value="Catalogo">
                        <div>
                            <div id="Menu_Catalogo">
                                <input type="button" value="Bodas">
                                <input type="button" value="Bautizos">
                                <input type="button" value="XV años">
                                <input type="button" value="Cumpleaños">
                                <input type="button" value="Baby Shower">
                                <input type="button" value="San Valentin">
                                <input type="button" value="Halloween">
                                <input type="button" value="Navidad">
                            </div>
                        </div>
                    </div>
                    <a href="PastelesPersonalizados.php">Pasteles personalizados</a>
                </section>
                <section id="seccion_iconos">
                    <a href="CarritoDeCompras.php">
                        <img src="../iconos/carro-de-la-carretilla.png" type="button" value="Catalogo">
                    </a>
                    <img onclick="mostrarBúsqueda()" src="../iconos/lupa1.png" type="button" value="Catalogo">
                    <div id="seccion_busqueda">
                        <input type="search" id="búsqueda">
                    </div>
                    <input type="button" value="Ingresar" id="Ingreso" onclick="MostrarVentanaDeIngreso()">
                </section>
                <label for="check" class="esconder_menu">
                    ×
                </label>
            </div>
        </div>
        <div id="Salto">
            <div id="VentanaForm">
                <form class="Mensaje" id="Ventana">
                    <div class="btnHaciaDerecha">
                        <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
                    </div>
                    <h2>Estimado usuario</h2>
                    <p>Su cuenta ha sido bloqueada, por favor póngase en contacto con nosotros para poder recuperar su
                        cuenta.</p>
                </form>

            </div>
        </div>
    </header>
    <div id="contenido_principal">
        <div id="DestacadoPrincipal">
            <ul>
                <li><img src="../imagenes/Slider1.jpg" alt=""></li>
                <li><img src="../imagenes/Slider2.jpg" alt=""></li>
                <li><img src="../imagenes/Slider3.jpg" alt=""></li>
                <li><img src="../imagenes/Slider4.jpg" alt=""></li>
            </ul>
        </div>
        <h1>PRODUCTOS DESTACADOS</h1>
        <section id="seccion_productos">
            <div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://th.bing.com/th/id/R.b042dade06440a9cf8c236b81ad2c4d8?rik=8ynKhjpIzp3%2bmA&amp;pid=ImgRaw&amp;r=0">
                </div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://th.bing.com/th/id/R.b40b59c817f0ec2c24a5097a457b2c58?rik=LSOvD1PsMJfxeA&amp;pid=ImgRaw&amp;r=0">
                </div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://sallysbakingaddiction.com/wp-content/uploads/2013/04/triple-chocolate-cake-4.jpg">
                </div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://th.bing.com/th/id/OIP.-vDV59NDSrLbo5SKb2jxggHaF3?pid=ImgDet&amp;rs=1">
                </div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://th.bing.com/th/id/R.46fb8a09fc2f95a905b4342a428bd1fd?rik=C3KVdZ9n6YOTIw&amp;pid=ImgRaw&amp;r=0">
                </div>
                <div>
                    <h3>Mostrar más información</h3><img src="https://www.recipetineats.com/wp-content/uploads/2020/08/My-best-Vanilla-Cake_9-SQ.jpg">
                </div>
            </div>
        </section>
        <script src="../script/script_querys.js"></script>
        <script src="../script/script_InteracciónPrincipal.js"></script>
    </div>
    <footer>
        <div id="Derechos">
            © 2023 Web Personal. 
        </div>
    </footer>
</body>

</html>