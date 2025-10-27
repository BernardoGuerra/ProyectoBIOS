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

   $ejecutar_consulta = mysqli_query($conexion, $sql)or die("Error en: $sql: " . mysqli_error($conexion));

   //mensajes de confirmacion
    if ($ejecutar_consulta) {
         $mje = "<span class='titERR'>Se modificó correctamente la categoría $categoria</span>";
    }else{
        $mje = "<span class='titERR'>No se pudo modificar la categoría $categoria</span>";
    }
    // cerrar conexión
    mysqli_close($conexion);
    // volver automáticamente al formulario
    
   // header("Location: history.back(-2)")
    header("Location: FormCatCREAR.php?MJE=$mje");
?>
