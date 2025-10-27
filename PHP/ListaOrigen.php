<?php
    // lista origen
    // conectar al servidor de base de datos
    include "../Conexion/conexion.php";
    // consulta
    $sql = "SELECT DISTINCT origenProd FROM productos ORDER BY origenProd";
    // ejecutar consulta
    $result = mysqli_query($conexion,$sql);
    // recorrer resultado y crear optiones de la lista
    while ($origProd=mysqli_fetch_array($result)) {
        // convertir datos
        $prod = utf8_encode($origProd["origenProd"]);
        // crear option
        echo "<option value='$origProd[origenProd]'>$prod</option>\n";
    } // end while
    // cerrar conexión
    mysqli_close($conexion);
?>
