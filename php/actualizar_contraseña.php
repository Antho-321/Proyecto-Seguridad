<?php
function validarContraseña($contraseña) {
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
session_start();
include("../php/Conexion.php");
$conexion = new Conexion;
$contraseña = $_POST['nueva_contraseña'];
$Rep_contraseña = $_POST['rep_nueva_contraseña'];
$correo = $_SESSION['correo'];
$hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

if ($contraseña != $Rep_contraseña) {
    echo '<script>
    window.alert("ERROR DE RECUPERACIÓN: Las contraseñas no coinciden"); 
    window.location = "../vistas/index.php";
    </script>';
} else {
if (validarContraseña($contraseña)) {
    $_SESSION['contraseña_valida']=true;
    $conexion->OperSql("UPDATE `cliente` SET `password`='$hashed_password' WHERE email='$correo';");
    $conexion->closeConnection();
    echo '<script>
    window.alert("Contraseña actualizada, por favor inicie sesión"); 
    </script>';
    header("Location: ../php/Logout.php");
}else{
    $_SESSION['contraseña_valida']=false;
    header("Location: ../vistas/cambio_contraseña.php");
}
    
}
