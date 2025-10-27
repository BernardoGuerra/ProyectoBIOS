<?php
    // Lista categorias
    // conectar al servidor de base de datos
    include "../Conexion/conexion.php";
    // consulta
    $sql = "SELECT * FROM categorias ORDER BY tipoCat";
    // ejecutar consulta
    $result = mysqli_query($conexion,$sql);
    // recorrer resultado y crear optiones de la lista
    while ($listaCat=mysqli_fetch_array($result)) {
        
        $categ = utf8_encode($listaCat["tipoCat"]);
        // crear option
        echo "<option value='$listaCat[idCat]'>$categ</option>\n";
    } // end while
    // cerrar conexión
    mysqli_close($conexion);
?>
