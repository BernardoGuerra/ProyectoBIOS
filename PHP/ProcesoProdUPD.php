<?php
    // proceso actualizar productos
    // Conectar al Servidor de Base de Datos
    include "../Conexion/conexion.php";
    // capturar datos del formulario
    
    $id          = ($_POST["id"]);
    $marca = utf8_decode($_POST["marca"]);
    $descripcion = utf8_decode($_POST["desc"]);
    $origen      = utf8_decode($_POST["origen"]);
    $precio      = ($_POST["precio"]);
    $categoria   = utf8_decode($_POST["cat"]);
    
   
    // consulta
  
    $sql  = "UPDATE productos SET marcaProd='$marca', descProd='$descripcion', origenProd='$origen', precioProd=$precio, idCatProd=$categoria WHERE idProd=$id";
  
    // ejecutar consulta
    
   $ejecutar_consulta = mysqli_query($conexion,$sql)or die("Error en: $sql: " . mysqli_error($conexion));

   //mensaje de confirmacion
       if ($ejecutar_consulta) {
         $mje = "<span class='titERR'>Se modificó correctamente el producto $descripcion marca $marca</span>";
    }else{
        $mje = "<span class='titERR'>No se pudo modificar el producto $descripcion marca $marca</span>";
    }
    // cerrar conexión
    mysqli_close($conexion);
    // volver automáticamente al formulario
    
   // header("Location: history.back(-2)")
    header("Location: ProcProdVERTODO.php?MJE=$mje");
?>
