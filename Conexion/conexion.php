
<?php
    // PROCESO DE CONEXION AL SERVIDOR DE BASE DE DATOS
    $conexion = mysqli_connect("192.168.10.50", "appuser", "clave_segura", "marketcamdb");
    // controlar conexión
    if (!$conexion) {
        echo "Error al conectar: " . mysqli_connect_errno() . " - " . mysqli_connect_error();
        exit;
    }

    // No es necesario este paso si ya pusiste la DB en mysqli_connect, pero si quieres control adicional:
    /*
    $selDB = mysqli_select_db($conexion, "marketcamdb");
    if (!$selDB) {
        echo "NO se pudo seleccionar BD...";
    }
    */
?>

