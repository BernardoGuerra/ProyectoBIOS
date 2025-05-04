<?php
    // PROCESO CREAR CATEGORÍAS
    // Conectar al Servidor de Base de Datos
    include "../Conexion/conexion.php";
    // capturar datos del formulario
    $categoria         = utf8_decode($_POST["Categ"]);
    
    $consulta = "SELECT * FROM categorias WHERE tipoCat='$categoria'";

    $resultado = mysql_query($consulta ,$conexion);
    $num_regs = mysql_num_rows($resultado);
    if ($num_regs==0) {
        // crear sentencia SQL para insertar registro
    $sql  = "INSERT INTO categorias ";
    $sql .= "(idCat,tipoCat) ";
    $sql .= "VALUES ";
    $sql .= "(null,'$categoria')";    
    
    // ejecutar sconsulta
    $ejecutarCons=mysql_query($sql,$conexion);
    // cerrar conexión
    mysql_close($conexion);

    //mensajes de confirmacion
    if ($ejecutarCons) {
        $mje = "<span class='titERR'>Se cargó correctamente la categoria. </span>";
    }else{
        $mje = "<span class='titERR'>No se pudo cargar la categoria $categoria</span>";
    }

    }else{
        $mje = "<span class='titERR'>ATENCIÓN!!! La categoría $categoria ya existe</span>";
    }


    
    // volver automáticamente al formulario
    header("Location: FormCatCREAR.php?MJE=$mje");
?>