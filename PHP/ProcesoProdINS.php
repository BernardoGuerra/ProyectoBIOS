<?php
    // PROCESO CREAR CATEGORÍAS
    // Conectar al Servidor de Base de Datos
    include "../Conexion/conexion.php";
    // capturar datos del formulario
    $marca         = utf8_decode($_POST["marca"]);
    $descripcion   = utf8_decode($_POST["desc"]);
    $origen        = utf8_decode($_POST["origen"]);
    $precio        = ($_POST["precio"]);
    $categoria     = ($_POST["cat"]);
    
    // consulta
    $sql  = "INSERT INTO productos ";
    $sql .= "(marcaProd,descProd,origenProd,precioProd,idCatProd) ";
    $sql .= "VALUES ";
    $sql .= "('$marca','$descripcion','$origen',$precio,$categoria)";    
    
    // ejecutar consulta
    $ejecutar_consulta=mysql_query($sql,$conexion);


    //mensaje de confirmacion
    if ($ejecutar_consulta) {
         $mje = "<span class='titERR'>Se cargó correctamente el producto.</span>";
    }else{
        $mje = "<span class='titERR'>No se pudo cargar el producto.</span>";
    }
    
    // cerrar conexión
    mysql_close($conexion);
    // volver automáticamente al formulario
    header("Location: ProcProdVERTODO.php?MJE=$mje");
?>