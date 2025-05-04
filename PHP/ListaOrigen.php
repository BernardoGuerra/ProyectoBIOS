<?php
    // lista origen
    // conectar al servidor de base de datos
    include "../Conexion/conexion.php";
    // consulta
    $sql = "SELECT DISTINCT origenProd FROM productos ORDER BY origenProd";
    // ejecutar consulta
    $result = mysql_query($sql,$conexion);
    // recorrer resultado y crear optiones de la lista
    while ($origProd=mysql_fetch_array($result)) {
        // convertir datos
        $prod = utf8_encode($origProd["origenProd"]);
        // crear option
        echo "<option value='$origProd[origenProd]'>$prod</option>\n";
    } // end while
    // cerrar conexión
    mysql_close($conexion);
?>