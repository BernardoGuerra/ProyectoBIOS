<?php
    // PROCESO CREAR CATEGORÍAS
    // Conectar al Servidor de Base de Datos
    include "../Conexion/conexion.php";
    // capturar datos del formulario
    
    $id          = ($_POST["id"]);
    $categoria   = utf8_decode($_POST["cat"]);
    
    
    // consulta
  
    $sql  = "UPDATE categorias SET tipoCat='$categoria' WHERE idCat=$id";
  

    // ejecutar consulta

   $ejecutar_consulta = mysql_query($sql,$conexion)or die("Error en: $sql: " . mysql_error());

   //mensajes de confirmacion
    if ($ejecutar_consulta) {
         $mje = "<span class='titERR'>Se modificó correctamente la categoría $categoria</span>";
    }else{
        $mje = "<span class='titERR'>No se pudo modificar la categoría $categoria</span>";
    }
    // cerrar conexión
    mysql_close($conexion);
    // volver automáticamente al formulario
    
   // header("Location: history.back(-2)")
    header("Location: FormCatCREAR.php?MJE=$mje");
?>