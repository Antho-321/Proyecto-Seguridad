<?php
include("../php/Conexion.php");
$conexion = new Conexion;
$random = rand(10000, 100000);
//Parte de registro
//Todo lo que envía el post a este lugar

function validarContraseña($contraseña)
{
    $contadores = [
        'mayuscula' => 0,
        'minuscula' => 0,
        'numero' => 0,
        'caracterEspecial' => 0
    ];

    // Contar tipos de caracteres
    for ($i = 0; $i < strlen($contraseña); $i++) {
        $caracter = $contraseña[$i];
        if (ctype_upper($caracter)) {
            $contadores['mayuscula']++;
        } elseif (ctype_lower($caracter)) {
            $contadores['minuscula']++;
        } elseif (ctype_digit($caracter)) {
            $contadores['numero']++;
        } elseif (!ctype_alnum($caracter)) {
            $contadores['caracterEspecial']++;
        }
    }

    // Verificar la presencia de todos los tipos de caracteres requeridos
    foreach ($contadores as $contador) {
        if ($contador === 0) {
            return false;
        }
    }

    // La contraseña cumple con los requisitos de tipos de caracteres
    return true;
}


$correo = $_POST['Correo'];
$contraseña = $_POST['Contraseña'];
$Rep_contraseña = $_POST['Rep_contraseña'];
//Inicia la consulta
$correoExiste = $conexion->OperSql("SELECT  `email` FROM `cliente` WHERE `email`='$correo';");
$existe = mysqli_fetch_array($correoExiste);
//Valida y ejecuta
if (isset($existe)) {
    echo '<script>
    window.alert("ERROR DE REGISTRO: Correo ya registrado por otro usuario"); 
    window.location = "../vistas/index.php";
    </script>';
} else if ($contraseña != $Rep_contraseña) {
    echo '<script>
    window.alert("ERROR DE REGISTRO: Las contraseñas no coinciden"); 
    window.location = "../vistas/index.php";
    </script>';
} else {
    if (validarContraseña($contraseña)) {
        echo "La contraseña es válida.";
        $para = $correo;
        $asunto = "Código de verificación";
        $cuerpo = "Verificación de dispositivo";
        $texto1 = "Código de verificación de registro en Pankey";
        $texto2 = "Hemos recibido una solicitud de registro en nuestro sitio web de pastelería utilizando tu dirección de correo electrónico. Tu código de verificación de registro es:";
        $texto3 = "Si no has solicitado este código, puede que alguien esté intentando registrarse en nuestro sitio web utilizando tu dirección de correo electrónico. No compartas este correo electrónico ni des el código a nadie. Has recibido este mensaje porque esta dirección de correo electrónico figura como dirección de contacto en la solicitud de registro en nuestro sitio web. Si crees que esto es un error, por favor ignora este mensaje o ponte en contacto con nosotros para solucionarlo. Gracias por elegir nuestro sitio web de pastelería.";
        $salida = shell_exec('node ../script/envio_correo.js "' . $para . '" "' . $asunto . '" "' . $cuerpo . '" "' . $texto1 . '" "' . $texto2 . '" "' . $texto3 . '" "' . $random . '"');
        session_start();
        //$_SESSION['cedula'] = $cedula;
        //$_SESSION['nombre'] = $nombre;
        //$_SESSION['apellido'] = $apellido;
        //$_SESSION['direccion'] = $direccion;
        $_SESSION['correo'] = $correo;
        $_SESSION['contraseña'] = $contraseña;
        $_SESSION['random'] = $random;
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../styles/estilo_Modificación_Index.css" id="estilo">
            <link rel="stylesheet" type="text/css" href="/styles/estilo_Envio_Correo.css">
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
                                <input class="Btn_Catalogo" type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;Catalogo&nbsp;&nbsp;&nbsp;">
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
                        <form id="Ventana" action="../php/Validación de datos.php" method="POST" class="Recuperación">
                            <div class="btnHaciaDerecha">
                                <input type="button" value="✕" id="btn_salir" onclick="irAIndex()">
                            </div>
                            <h2>REGISTRARSE</h2>
                            <label id="texto_info" for="correo">Ingrese el código enviado a su correo electrónico. Por favor revise la carpeta de correo no deseado si no lo encuentra.</label>
                            <input type="number" id="código" name="comparacion" class="entrada_texto">
                            <button id="finalización_registro">Finalizar registro</button>
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
    } else {
        echo "La contraseña no cumple con los requisitos.";
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
                        <div id="Ventana">
                            <div class="btnHaciaDerecha">
                                <input type="button" value="✕" id="btn_salir" onclick="CerrarVentana()">
                            </div>
                            <!-- Esta parte está modificada por que debía estar metido esto dentro de un form para usar un POST -->
                            <form action="../php/enviar_correo_registro.php" method="POST" class="Formulario_Registro" id="Ventana">
                                <h2>Registrarse</h2>
                                <label for="correo">Correo electrónico:</label>
                                <input type="email" id="correo" name="Correo" class="entrada_texto">
                                <label for="contraseña">Contraseña:</label>
                                <input type="password" id="contraseña" name="Contraseña" class="entrada_texto">
                                <label for="rep_contraseña">Repita la contraseña:</label>
                                <input type="password" id="rep_contraseña" name="Rep_contraseña" class="entrada_texto">
                                <!------LA FUNCIÓN runQuery está en el archivo script_Registro.js------>
                                <button id="registro">Registrarse</button>
                                <label for="RegresarAIngreso">¿Ya tienes una cuenta?</label>
                                <input type="button" value="Ingresar" id="RegresarAIngreso" onclick="MostrarVentanaDeIngreso()">
                                <p><b style="color: black; font-size: 20px">¡Contraseña no válida!</b> Recuerda: La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número y un signo especial</p>
                                <script src="../script/script_Registro.js"></script>
                            </form>
                        </div>
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
            </footer>
        </body>
        </html>
<?php
    }
}
?>
