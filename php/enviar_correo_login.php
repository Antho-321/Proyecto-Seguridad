<?php
include("../php/Conexion.php");
$conexion = new Conexion;
$random = rand(10000, 100000);
//Parte de registro
//Todo lo que envía el post a este lugar

$correo = $_POST['Correo'];
$contraseña = $_POST['Contraseña'];
//Inicia la consulta
$correoExiste = $conexion->OperSql("SELECT  `email` FROM `cliente` WHERE `email`='$correo';");
$existe = mysqli_fetch_array($correoExiste);
//Valida y ejecuta
if (isset($existe)) {
    $consulta_contraseña = $conexion->OperSql("SELECT password, failed_attempts FROM `cliente` WHERE `email`='$correo';");
    $array_consulta_contraseña = $consulta_contraseña->fetch_array();
    $contraseña_registrada = $array_consulta_contraseña['password'];
    $failedAttempts = $array_consulta_contraseña['failed_attempts'];
    if (!password_verify($contraseña, $contraseña_registrada)) {
        $failedAttempts++;
        $conexion->OperSql("UPDATE `cliente` SET failed_attempts = $failedAttempts WHERE `email`='$correo';");
        if ($failedAttempts >= 3) {
            $conexion->OperSql("UPDATE `cliente` SET activo = false WHERE `email`='$correo';");
            header("location:../vistas/cuenta_bloqueada.php");
        } else {
            ?>
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
                            <form action="../php/enviar_correo_login.php" method="POST" class="Formulario_Ingreso" id="Ventana">
                                <div class="btnHaciaDerecha">
                                    <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
                                </div>

                                <h2>Ingresar</h2>
                                <label for="correo">Correo electrónico:</label>
                                <input type="email" id="correo" name="Correo" class="entrada_texto">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" id="contraseña" name="Contraseña" class="entrada_texto">
                                <p style="color:red">Contraseña no válida, por favor intenta de nuevo</p>
                                <div class="btnHaciaDerecha">
                                    <input type="button" id="contraseña_olvidada" value="¿Olvidaste tu contraseña?"
                                        onclick="MostrarVentanaRecuperación_Correo()">
                                </div>
                                <button>Ingresar</button>
                                <div id="SinCuenta">
                                    <label for="contraseña">¿No tienes una cuenta?</label>
                                    <input type="button" id="sin_cuenta" value="Registrarse" onclick="MostrarVentanaDeRegistro()">
                                </div>
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
                                <h3>Mostrar más información</h3><img
                                    src="https://th.bing.com/th/id/R.b042dade06440a9cf8c236b81ad2c4d8?rik=8ynKhjpIzp3%2bmA&amp;pid=ImgRaw&amp;r=0">
                            </div>
                            <div>
                                <h3>Mostrar más información</h3><img
                                    src="https://th.bing.com/th/id/R.b40b59c817f0ec2c24a5097a457b2c58?rik=LSOvD1PsMJfxeA&amp;pid=ImgRaw&amp;r=0">
                            </div>
                            <div>
                                <h3>Mostrar más información</h3><img
                                    src="https://sallysbakingaddiction.com/wp-content/uploads/2013/04/triple-chocolate-cake-4.jpg">
                            </div>
                            <div>
                                <h3>Mostrar más información</h3><img
                                    src="https://th.bing.com/th/id/OIP.-vDV59NDSrLbo5SKb2jxggHaF3?pid=ImgDet&amp;rs=1">
                            </div>
                            <div>
                                <h3>Mostrar más información</h3><img
                                    src="https://th.bing.com/th/id/R.46fb8a09fc2f95a905b4342a428bd1fd?rik=C3KVdZ9n6YOTIw&amp;pid=ImgRaw&amp;r=0">
                            </div>
                            <div>
                                <h3>Mostrar más información</h3><img
                                    src="https://www.recipetineats.com/wp-content/uploads/2020/08/My-best-Vanilla-Cake_9-SQ.jpg">
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
            <?php
        }
    } else {
        if ($failedAttempts >= 3) {
            $conexion->OperSql("UPDATE `cliente` SET activo = false WHERE `email`='$correo';");
            header("location:../vistas/cuenta_bloqueada.php");
        }else{
            $para = $correo;
            $asunto = "Código de verificación";
            $cuerpo = "Verificación de dispositivo";
            $texto1 = "Código de verificación de ingreso en Pankey";
            $texto2 = "Hemos recibido una solicitud de ingreso en nuestro sitio web de pastelería utilizando tu dirección de correo electrónico. Tu código de verificación de ingreso es:";
            $texto3 = "Si no has solicitado este código, puede que alguien esté intentando ingresar en nuestro sitio web utilizando tu dirección de correo electrónico. No compartas este correo electrónico ni des el código a nadie. Has recibido este mensaje porque esta dirección de correo electrónico figura como dirección de contacto en la solicitud de ingreso en nuestro sitio web. Si crees que esto es un error, por favor ignora este mensaje o ponte en contacto con nosotros para solucionarlo. Gracias por elegir nuestro sitio web de pastelería.";
            $salida = shell_exec('node ../script/envio_correo.js "' . $para . '" "' . $asunto . '" "' . $cuerpo . '" "' . $texto1 . '" "' . $texto2 . '" "' . $texto3 . '" "' . $random . '"');
            session_start();
            $_SESSION['correo'] = $correo;
            $_SESSION['contraseña'] = $contraseña;
            $_SESSION['random'] = $random;
            $conexion->OperSql("UPDATE `cliente` SET failed_attempts = 0 WHERE `email`='$correo';");
        }
        
        ?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../styles/estilo_Modificación_Index.css" id="estilo">
            <link rel="stylesheet" type="text/css" href="../styles/estilo_Envio_Correo.css">
            <title>REPOSTERIA</title>
        </head>

        <body>
            <input type="checkbox" id="check2">
            <header id="Cabecera">
                <div id="Contenido_Cabecera">
                    <img src="../imagenes/LOGO_PANKEY1.png" alt="LOGO_PANKEY" id="LogoPankey">
                    <input type="checkbox" id="check">
                    <label for="check" class="mostrar_menu">
                        &#8801
                    </label>
                    <div id="botones_iconos">
                        <section id="seccion_botones">
                            <a href="../vistas/index.php">Inicio</a>
                            <a href="../vistas/SobreNosotros.php">Sobre Nosotros</a>
                            <div id="Catalogo">
                                <input class="Btn_Catalogo" type="button"
                                    value="&nbsp;&nbsp;&nbsp;&nbsp;Catalogo&nbsp;&nbsp;&nbsp;">
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
                        </section>
                        <section id="seccion_iconos">
                            <a href="../vistas/CarritoDeCompras.php">
                                <img src="../iconos/carro-de-la-carretilla.png" type="button" value="Catalogo">
                            </a>
                            <img onclick="mostrarBúsqueda()" src="../iconos/lupa1.png" type="button" value="Catalogo">
                            <div id="seccion_busqueda">
                                <input type="search" id="búsqueda">
                            </div>
                            <?php if (!isset($id)) { ?>
                                <input type="button" value="Ingresar" id="Ingreso" onclick="MostrarVentanaDeIngreso()">
                            <?php } else { ?>
                                <button onclick="Logout()" id="Salida"><a>Salir</button>
                            <?php } ?>

                        </section>
                        <label for="check" class="esconder_menu">
                            &#215
                        </label>
                    </div>
                </div>
                <div id="Salto">
                    <div id="VentanaForm">
                        <form id="Ventana" action="../php/Login.php" method="POST" class="Recuperación">
                            <div class="btnHaciaDerecha">
                                <input type="button" value="✕" id="btn_salir" onclick="irAIndex()">
                            </div>
                            <h2>INGRESAR</h2>
                            <label id="texto_info" for="correo">Ingrese el código enviado a su correo electrónico. Por favor
                                revise la carpeta de correo no deseado si no lo encuentra.</label>
                            <input type="number" id="código" name="comparacion" class="entrada_texto">
                            <button id="finalización_registro">Ingresar</button>
                            <div></div>
                        </form>
                    </div>
                </div>
            </header>

            <div id="contenido_principal">
                <!-- //////////////////////////////////////////PRODUCTOS DESATACADOS/////////////////////////////////////////////// -->
                <div id="DestacadoPrincipal">
                    <ul>
                        <li><img src="../imagenes/Slider1.jpg" alt=""></li>
                        <li><img src="../imagenes/Slider2.jpg" alt=""></li>
                        <li><img src="../imagenes/Slider3.jpg" alt=""></li>
                        <li><img src="../imagenes/Slider4.jpg" alt=""></li>
                    </ul>
                </div>
                <h1>PRODUCTOS DESTACADOS</h1>
                <section id="seccion_productos"></section>
                <script src="../script/script_querys.js"></script>
                <script src="../script/script_InteracciónPrincipal.js"></script>

            </div>

            <footer>
                <div id="Derechos">
                    © 2023 Web Personal. 
                </div>
            </footer>
            </div>
        </body>

        </html>
        <?php
    }
} else {
    ?>
    <script>
        window.alert("ERROR DE INGRESO: Correo no registrado");
        window.location = "../vistas/index.php";
    </script>
    <?php
}
?>