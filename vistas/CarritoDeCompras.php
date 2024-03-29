<?php
//Inicia la sesión y checa si hay un id, lo que indica que ya esta logueado alguien
session_start();
$Subtotal = 0;
$Iva = 0;
$Total = 0;
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    include("../php/Conexion.php");
    $conexion = new Conexion;
    $consulta_id_pedido = $conexion->OperSql("SELECT ID_PEDIDO FROM pedido WHERE ID_CLIENTE=$id AND ESTADO='pendiente';");
    $array_id_pedido = $consulta_id_pedido->fetch_array();
    if ($array_id_pedido != null) {
        $id_pedido = $array_id_pedido['ID_PEDIDO'];
        // Configuración de la conexión a la base de datos
        $enlace = "";
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "2db_pankey";

        // Crear una nueva conexión PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        // Preparar la consulta SQL
        $sql = "SELECT Subtotal FROM canasta WHERE ID_PEDIDO = $id_pedido";

        // Ejecutar la consulta y obtener los resultados
        $stmt = $pdo->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Defino variables
        $Subtotal = 0;
        $Iva = 0;
        $Total = 0;


        // Iterar a través de los resultados y mostrar la columna "Sutotal"
        foreach ($results as $row) {

            $Subtotal += $row['Subtotal'];
        }
        $Iva = ($Subtotal * 12) / 100;
        $Total = $Subtotal + $Iva;

    }
    $consulta_num_comprobantes = $conexion->OperSql("SELECT COUNT(*) AS NUM_COMPROBANTES FROM comprobante_venta;");
    $array_num_comprobantes = $consulta_num_comprobantes->fetch_array();
    $num_comprobantes = $array_num_comprobantes['NUM_COMPROBANTES'];
    $id_comprobante=$num_comprobantes+1;

} else if (isset($_SESSION['contraseña'])) {
    header("Location: ../php/Logout.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../styles/estilo_Modificación_CarritoDeCompras.css" id="estilo">
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ae1w7jU4kbRrRCFluXHkxbnTITPA_JXsU-0aSuXq0oSiqkA-IKkxyIeexgvkG5QFbQTa9EhbbJaECvUP&currency=USD"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.3/html2canvas.min.js"></script>
    <link rel="shortcut icon" href="../favicon.ico">
    <title>Pankey</title>
</head>

<body>
    <input type="checkbox" id="check3" onchange="DescargarComprobante()">
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
        </div>
    </header>

    <div id="contenido_principal">
        <section id="Productos">
            <div class="tabla_info">
                <div class="fila" id="primera_fila">
                    <br class="col">
                    <p class="col">Dedicatoria/s</p>
                    <p class="col">Masa</p>
                    <p class="col">Sabor</p>
                    <p class="col">Relleno</p>
                    <p class="col">Cobertura</p>
                    <p class="col">Precio unitario</p>
                    <p class="col">Cantidad</p>
                </div>

            </div>
        </section>
        <section id="Info_adicional">
            <h2>Total</h2>
            <p class="col" id="total">
            $<?php echo $Subtotal ?>
            </p>
            <div class="tabla_info">
                <div class="fila">
                    <label class="col" for="fecha_entrega">Fecha de entrega:</label>
                    <div id="entrada_fecha" class="col">
                        <input type="date" id="fecha_entrega" name="fecha_entrega" required>
                        <div id="error-message" class="error">La fecha ingresada no puede ser menor o igual a la fecha actual.</div>
                        <div id="error-message3" class="error">Fecha inválida.</div>
                    </div>
                </div>
                <div class="fila">
                    <label class="col" for="time">Hora:</label>
                    <div id="entrada_tiempo" class="col">
                        <input type="time" id="hora_entrega">
                        <input type="hidden" name="id_comprobante" id="id_comprobante" value="<?php echo $id_comprobante?>">
                        <input type="hidden" name="id_pedido" id="id_pedido" value="<?php echo $id_pedido?>">
                        <div id="error-message2" class="error">La entrega del pedido no puede realizarse en menos de 24 horas.</div>
                    </div>
                </div>

            </div>
            <div id="botones_carrito">
                <input id="fin_pedido" class="fin_pedido" type="button" value="Finalizar pedido" onclick="finalizarPedido()">
                <label for="check3" id="desc_comp" class="desc_fact" style="display:none">
                    Descargar comprobante
                </label>
            </div>

            <p>Nota: Pronto incorporaremos la entrega a
                domicio. Los pedidos que realices puedes
                retirarlos de nuestro local desde las 24h
                transcurridas.<br>
                Dirección: Av. Atahualpa y Tobías Mena, a
                unos pasos del coliseo de la Bola Amarilla
            </p>
        </section>

    </div>

    <footer>
        <div id="Derechos">
            © 2023 Web Personal. Creado por Tito Córdova, De la Cruz Brayan, Luna Anthony
        </div>
    </footer>

    <script src="../script/script_querys.js"></script>
    <script src="../script/script_InteracciónPrincipal.js"></script>

</body>

</html>