<?php
    // PROCESO DE CONEXION AL SERVIDOR DE BASE DE DATOS
    $conexion = mysql_connect("ubuntusqlserver.red.local","root","password");
    // controlar conexión
    if (!$conexion) {
      //  header("Location: ProcesoErrorPage.php?MSG=NO se pudo CONECTAR al SERVIDOR de Base de Datos");
    echo "NO se pudo conectar...";

    } // endif
    


   // seleccionar Base de Datos
    $selDB = mysql_select_db("marketcamdb",$conexion);
    // controlar conexión
    if (!$selDB) {
       // header("Location: ProcesoErrorPage.php?MSG=NO se pudo SELECCIONAR Base de Datos");
        echo "NO se pudo seleccionar BD...";
    } // endif
?>
