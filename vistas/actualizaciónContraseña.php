<?php
session_start();
$comparacion = $_POST['comparacion'];
$desde_index = $_POST['desde_index'];
$random = $_SESSION['random'];

if ($desde_index=="true") {
    $_SESSION['desde_index'] = true;
    
    header("location:../vistas/cambio_contraseña.php");

}else{
    if ($random == $comparacion) {
        header("location:../vistas/cambio_contraseña.php");
    } else {
        $conexion->closeConnection();
        echo '<script>
        window.alert("Codigos incorrectos"); 
        window.location = "../vistas/Index.php";
        </script>';
    }
    
}
